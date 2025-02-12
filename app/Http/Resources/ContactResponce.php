<?php

namespace App\Http\Resources;

use App\Models\bill;
use App\Models\invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResponce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $balance = invoice::tenant()
        ->where('contact_id', $this->id)
        ->sum('amount') 
        - bill::findtenant()
        ->where('contact_id', $this->id)
        ->sum('total_price');

        return [
            'id' => $this->id,
            'business_id' => $this->business_id,
            'name' => $this->name,
            'organisation' => $this->organisation,
            'email' => $this->email,
            'billing_email' => $this->billing_email,
            'telephone' => $this->telephone,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'town' => $this->town,
            'region' => $this->region,
            'zip_code' => $this->zip_code,
            'country' => $this->country,
            'default_payment_terms' => $this->default_payment_terms,
            'contact_level_email' => $this->contact_level_email,
            'contact_level_invoice' => $this->contact_level_invoice,
            'display_contact_name' => $this->display_contact_name,
            'sales_tax_registration_number' => $this->sales_tax_registration_number,
            'invoice_language' => $this->invoice_language,
            'balance' => $balance,
            'created_at' => $this->created_at, 
        ];
    }
}
