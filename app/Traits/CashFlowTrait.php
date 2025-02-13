<?php

namespace App\Traits;

use App\Models\bill;
use App\Models\invoice;
use Illuminate\Support\Facades\DB;

trait CashFlowTrait
{
    public function getCashFlow($months, $id)//بتجيب الدفقات النقدية الفلوس اللي داخلة و الفلوس اللي خارجة و الفرق بينهم
    {
        $currentMonth = now();
        $startDate = now()->subMonths($months);//بداية الفترة علي حسب عدد الاشهر
        
        $invoices = invoice::tenant()
            ->select(DB::raw('MONTH(invoice_date) as month, YEAR(invoice_date) as year, SUM(amount) as total_incoming'))
            ->whereDate('invoice_date', '>=', $startDate)
            ->where('business_id', $id)
            ->groupBy('year', 'month')
            ->get();
    
        $bills = bill::findtenant()
            ->select(DB::raw('MONTH(bill_date) as month, YEAR(bill_date) as year, SUM(total_price) as total_outgoing'))
            ->whereDate('bill_date', '>=', $startDate)
            ->where('business_id', $id)
            ->groupBy('year', 'month')
            ->get();

        $cashflowData = [];
        
        foreach ($invoices as $invoice) {
            $key = $invoice->year . '-' . str_pad($invoice->month, 2, '0', STR_PAD_LEFT);//str_pad هيا دالة بضيف 0 علي يسار الرقم لو اقل من رقمين
            $cashflowData[$key]['incoming'] = ($cashflowData[$key]['incoming'] ?? 0) + (float)$invoice->total_incoming;
        }
        
        foreach ($bills as $bill) {
            $key = $bill->year . '-' . str_pad($bill->month, 2, '0', STR_PAD_LEFT);
            $cashflowData[$key]['outgoing'] = ($cashflowData[$key]['outgoing'] ?? 0) + (float)$bill->total_outgoing;
        }

        $monthsData = [];
        
        for ($i = 0; $i < $months; $i++) {
            $month = $currentMonth->copy()->subMonths($i);
            $key = $month->format('Y') . '-' . str_pad($month->format('m'), 2, '0', STR_PAD_LEFT);
            
            $monthsData[] = [
                'month' => $month->format('M'),
                'year' => $month->format('Y'),
                'incoming' => $cashflowData[$key]['incoming'] ?? 0,
                'outgoing' => $cashflowData[$key]['outgoing'] ?? 0,
                'balance' => ($cashflowData[$key]['incoming'] ?? 0) - ($cashflowData[$key]['outgoing'] ?? 0),
            ];
        }
    
        $reversedData = array_reverse($monthsData);
        return $reversedData;
    }
}
