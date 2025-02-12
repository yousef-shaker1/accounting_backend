<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TenantResponce;
use App\Http\Resources\InvoiceResponce;

class TenantController extends Controller
{
    use HttpResponses;
    public function index(){
        $Tenants = TenantResponce::collection(Tenant::all());
        return $this->successResponse($Tenants);
    }

    public function show($id){
        $tenant = Tenant::findOrFail($id);

        if(!$tenant){
            return $this->errorResponse();
        }

        return $this->successResponse(new TenantResponce($tenant));
    }

    public function destroy($id){
        $tenant = Tenant::findOrFail($id);
        if(!$tenant){
            return $this->errorResponse();
        }
        $tenant->delete();

        return $this->successResponse(null);
    }
    
}
