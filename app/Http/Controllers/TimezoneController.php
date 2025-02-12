<?php

namespace App\Http\Controllers;

use App\Models\Timezone;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return $this->successResponse(Timezone::select('id', 'timezone', 'name')->get());
    }
}
