<?php

namespace App\Http\Controllers\Business;

use App\Models\Business;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AccountResponce;
use App\Http\Resources\BusinessResponce;

class BusinessController extends Controller
{
    use HttpResponses;
    public function index()
    {
        $Business = BusinessResponce::collection(Business::where('user_id', Auth::user()->id)->get());
        return $this->successResponse($Business);
    }
}