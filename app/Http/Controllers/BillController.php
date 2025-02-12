<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Pest\Support\Str;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\BillRequest;
use App\Http\Resources\BillResponce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    use HttpResponses;

    public function index(Request $request, $id){
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $bills = bill::findtenant()
            ->where('business_id', $id)
            ->when($search, function($query) use ($search) {
                return $query->where('reference', 'LIKE', "%{$search}%");
            })
            ->paginate(10, ['*'], 'page', $page);        
            
        return response()->json([
            'message' => 'Success',
            'data' => billResponce::collection($bills),
            'totalPages' => $bills->lastPage(),
            'currentPage' => $bills->currentPage(),
        ], 200);
    }

    public function show($id){
        $bill = bill::findtenant()->where('id',$id)->first();

        if(!$bill){
            return $this->errorResponse();
        }

        return $this->successResponse(new billResponce($bill));
    }

    public function store(BillRequest $request) {
        $data = $request->validated();
        $data['tenant_id'] = Auth::user()->tenant_id;

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('bill_file', $filename, 'public');
                $data['file'] = 'bill_file/' . $filename; 
            }
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'file upload failed: ' . $e->getMessage(), 500);
        }

        $bill = bill::create($data);
        return $this->successResponse(new billResponce($bill));
    }

    public function update(BillRequest $request, $id)
    {
        $data = $request->validated();
        $bill = bill::findtenant()->where('id',$id)->first();

        //update bill file
        if ($request->hasFile('file')) {
            try {
                if ($bill->file) {
                    Storage::disk('public')->delete('bill_file/' . basename($bill->file));
                }
                $file = $request->file('file');
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('bill_file', $filename, 'public');
                $data['file'] = 'bill_file/' . $filename;
            } catch (\Exception $e) {
                return $this->errorResponse(null, 'file upload failed: ' . $e->getMessage(), 500);
            }
        }

        $bill->update($data);
    
        return $this->successResponse(new billResponce($bill));
    }

    public function destroy($id){
     $bill = bill::findtenant()->where('id',$id)->first();
    
        if(!$bill){
            return $this->errorResponse('bill not found');
        }
        //delete bill file
        if ($bill->file) {
            $filePath = parse_url($bill->file, PHP_URL_PATH);
            $FileName = basename($filePath);
            
            Storage::disk('public')->delete('bill_file/' . basename($FileName));
        }
        $bill->delete();

        return $this->successResponse(null);
    }
}
