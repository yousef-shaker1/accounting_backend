<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return $this->successResponse(Currency::select('id', 'code', 'name')->get());
    }
}
