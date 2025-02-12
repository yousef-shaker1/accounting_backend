<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Business;
use App\Models\SalesTax;
use App\Models\BankAccount;
use App\Models\CountryOption;
use App\Traits\HttpResponses;
use App\Models\AccountingDate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\StepOneRequest;
use App\Http\Requests\Setup\StepTwoRequest;
use App\Http\Requests\Setup\StepFiveRequest;
use App\Http\Requests\Setup\StepFourRequest;
use App\Http\Requests\Setup\StepThreeRequest;

class SetupController extends Controller
{
    use HttpResponses;

    // business details step
    public function stepOne(StepOneRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['step_number'] = 1;
        $business = Business::create($data);
        return $this->successResponse($business, 'Business details added successfully', 201);
    }

    // country options (display formats) dates step
    public function stepTwo(StepTwoRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $business = CountryOption::create($data);
        Business::where('user_id', $request->user()->id)->where('step_number', 1)->update(['step_number' => 2]);
        return $this->successResponse($business, 'Country options added successfully', 201);
    }


    // accounting dates step
    public function stepThree(StepThreeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['company_start_date'] = Carbon::createFromFormat('m-d-Y', $data['company_start_date'])->format('Y-m-d');
        $data['first_accounting_year_end_date'] = Carbon::createFromFormat('m-d-Y', $data['first_accounting_year_end_date'])->format('Y-m-d');
        $data['app_start_date'] = Carbon::createFromFormat('m-d-Y', $data['app_start_date'])->format('Y-m-d');
        $business = AccountingDate::create($data);
        Business::where('user_id', $request->user()->id)->where('step_number', 2)->update(['step_number' => 3]);
        return $this->successResponse($business, 'Accounting dates added successfully', 201);
    }


    // sales tax details step
    public function stepFour(StepFourRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $business = SalesTax::create($data);
        Business::where('user_id', $request->user()->id)->where('step_number', 3)->update(['step_number' => 4]);
        return $this->successResponse($business, 'Sales Tax added successfully', 201);
    }


    // banking details step
    public function stepFive(StepFiveRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();
        $data['user_id'] = $user->id;
        $business = BankAccount::create($data);
        $user->update(['setup_completed' => true]);
        Business::where('user_id', $request->user()->id)->where('step_number', 4)->update(['step_number' => 5]);
        return $this->successResponse($business, 'Banking added successfully', 201);
    }
}
