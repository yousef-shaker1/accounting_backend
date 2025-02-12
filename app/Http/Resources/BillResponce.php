<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResponce extends JsonResource
{
    /** 
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $dueDate = Carbon::parse($this->due_on);
        $currentDate = Carbon::now();
        $status = '';
        
        if ($dueDate->greaterThan($currentDate)) {
            $yearsDifference = $currentDate->diffInYears($dueDate)% 12;
            $monthsDifference = $currentDate->diffInMonths($dueDate) % 12; 
        
            if ($yearsDifference > 0 && $monthsDifference > 0) {
                $status = "Due in $yearsDifference year and $monthsDifference month";
            } elseif ($yearsDifference > 0) {
                $status = "Due in $yearsDifference year";
            } elseif ($monthsDifference > 0) {
                $status = "Due in $monthsDifference month";
            } else {
                $daysDifference = $currentDate->diffInDays($dueDate)%12;
                $status = "Due in $daysDifference day";
            }
        } else {
            $status = "Due date has passed";
        }
        return [
            'id' => $this->id,
            'business_id' => $this->business_id,
            'contact_name' => $this->contact->name,
            'reference' => $this->reference,
            'bill_date' => $this->bill_date,
            'due_on' => $this->due_on,
            'currency_id' => $this->currency_id,
            'is_tax_included' => $this->is_tax_included,
            'comment' => $this->comment,
            'item_category_type' => $this->item_category_type,
            'business_category_id' => $this->business_category_id,
            'total_price' => $this->total_price,
            'bill_recurs' => $this->bill_recurs,
            'file' => $this->file,
            'attachment_description' => $this->attachment_description,
            'status' => $status,
            'created_at' => $this->created_at,
        ];
    }
}
