<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\BusinessCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessCategoryResponce;

class CategoryController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $Business_Category = BusinessCategoryResponce::collection(BusinessCategory::get());
        return $this->successResponse($Business_Category);
    }
}
