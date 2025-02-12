<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\BankRequest;
use App\Http\Resources\BankResponce;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    use HttpResponses;
    public function index(Request $request){
        $search = $request->input('search');
        $page = $request->input('page', 1);

        $banks = Bank::findtenant()
            ->when($search, function($query) use ($search) {
                return $query->where('account_name', 'LIKE', "%{$search}%");
            })
            ->paginate(10, ['*'], 'page', $page);

        return response()->json([
            'message' => 'Success',
            'data' => BankResponce::collection($banks),
            'totalPages' => $banks->lastPage(),
            'currentPage' => $banks->currentPage(),
        ], 200);
    }

    public function show(Request $request, $id) {
        $bank = Bank::findtenant()->findOrFail($id);

        if(!$bank){
            return $this->errorResponse('bank not found', 404);
        }
        
        return $this->successResponse(new BankResponce($bank));
    }

    public function store(BankRequest $request) {
        $data = $request->validated();
        $data['tenant_id'] = Auth::user()->tenant_id;
        $bank = Bank::create($data);
        return $this->successResponse(new BankResponce($bank));
    }

    public function update(BankRequest $request, $id) {
        $bank = Bank::findtenant()->findOrFail($id);
        $bank->update($request->validated());
    
        return $this->successResponse(new BankResponce($bank));
    }

    public function destroy($id) {
        $bank = Bank::findtenant()->findOrFail($id);
        if(!$bank){
            return $this->errorResponse();
        }
        $bank->delete();
        return $this->successResponse(null);
    }

    public function overview_all_banks(){
        $balance = Bank::findtenant()->sum('balance');
        return $this->successResponse($balance);
    }

    public function overview_show_banks($id){
        $balance = Bank::findtenant()->select('balance')->findOrFail($id);
        return $this->successResponse($balance);
    }


}
