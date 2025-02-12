<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResponce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'contact_name' => $this->contact->name,
            'invoice_reference' => $this->invoice_reference,
            'invoice_date' => $this->invoice_date,
            'payment_terms' => $this->payment_terms,
            'currency' => $this->currency->name,
            'additional_text' => $this->additional_text,
            'invoice_discount' => $this->invoice_discount,
            'custom_contact_name' => $this->custom_contact_name,
            'custom_payment_terms' => $this->custom_payment_terms,
            'po_reference' => $this->po_reference,
            'amount' => $this->amount,
            'status' => $this->status ?? 'draft',
            'is_letterheaded' => $this->is_letterheaded,
            'display_project_name' => $this->display_project_name,
            'display_bic_iban' => $this->display_bic_iban,
            'business_id' => $this->business_id,
            'created_at' => $this->created_at,
        ];
    }
}
