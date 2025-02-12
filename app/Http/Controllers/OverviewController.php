<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\invoice;
use Illuminate\Http\Request;
use App\Traits\CashFlowTrait;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class OverviewController extends Controller
{
    use HttpResponses, CashFlowTrait;
    public function cashflow12Months($id)
    {
        $monthsData = $this->getCashFlow(12,$id);
        return $this->successResponse($monthsData);
    }


    public function cashflow6Months($id)
    {
        $monthsData = $this->getCashFlow(6,$id);
        return $this->successResponse($monthsData);
    }
    
    public function cashflow3Months($id)
    {
        $monthsData = $this->getCashFlow(3,$id);
        return $this->successResponse($monthsData);
    }

    public function profitandlose($id)
    {
        $invoices = invoice::tenant()
        ->where('business_id', $id)
        ->select(DB::raw('SUM(amount) as total_income'))
        ->value('total_income') ?? 0;
        
        $bills = bill::findtenant()
        ->where('business_id', $id)
        ->select(DB::raw('SUM(total_price) as total_expenses'))
        ->value('total_expenses') ?? 0;
        
        $operatingProfit = $invoices - $bills;
        
        $drawings = invoice::tenant()
        ->where('business_id', $id)
        ->whereNotNull('amount')
        ->sum('amount') ?? 0;
        
        $adjustments = invoice::tenant()
        ->where('business_id', $id)
        ->whereNotNull('invoice_discount')
        ->sum('invoice_discount') ?? 0;

        $operatingProfit = $invoices - $bills - $drawings - $adjustments;

        $retainedProfitThisPeriod = $operatingProfit;
        $broughtForward = 0; 
        $carriedForward = $retainedProfitThisPeriod + $broughtForward;

        return response()->json([
        'income' => $invoices,
        'expenses' => $bills,
        'operating_profit' => $operatingProfit,
        'less' => [
            'drawings' => $drawings,
            'adjustments' => $adjustments,
        ],
        'retained_profit' => [
            'this_period' => $retainedProfitThisPeriod,
            'brought_forward' => $broughtForward,
            'carried_forward' => $carriedForward,
        ],
        ]);

        }
}


