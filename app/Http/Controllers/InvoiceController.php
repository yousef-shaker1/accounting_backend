<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\InvoiceResponce;
use App\Http\Requests\StatusInvoiceRequest;

class InvoiceController extends Controller
{
    use HttpResponses;

    public function index(Request $request, $id){
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $invoices = invoice::tenant()
            ->where('business_id', $id)
            ->when($search, function($query) use ($search) {
                return $query->where('invoice_reference', 'LIKE', "%{$search}%");
            })
            ->paginate(10, ['*'], 'page', $page);
    
        return response()->json([
            'message' => 'Success',
            'data' => InvoiceResponce::collection($invoices),
            'totalPages' => $invoices->lastPage(),
            'currentPage' => $invoices->currentPage(),
        ], 200);

    }

    public function show($id){
        $invoice = invoice::tenant()->where('id',$id)->first();

        if(!$invoice){
            return $this->errorResponse();
        }
        return $this->successResponse(new InvoiceResponce($invoice));
    }
    
    public function store(InvoiceRequest $request) {
        $data = $request->validated();
        $data['tenant_id'] = Auth::user()->tenant_id;
        $invoice = invoice::create($data);
        return $this->successResponse(new InvoiceResponce($invoice));
    }

    public function update(InvoiceRequest $request, $id)
    {
        $invoice = invoice::tenant()->findOrFail($id);
        $invoice->update($request->validated());
    
        return $this->successResponse(new InvoiceResponce($invoice));
    }

    public function destroy($id){
        $invoice = invoice::tenant()->findOrFail($id);
        if(!$invoice){
            return $this->errorResponse();
        }
        $invoice->delete();

        return $this->successResponse(null);
    }

    public function edit_status(StatusInvoiceRequest $request, $id){
        $data = $request->validated();

        $invoice = invoice::tenant()->find($id);
        if(!$invoice){
            return $this->errorResponse('Not Found', 404);
        }
        $invoice->update([
            'status' => $data['status']
        ]);
        return $this->successResponse(new InvoiceResponce($invoice));
    }
}
