<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankResponce extends JsonResource
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
            'account_name' => $this->account_name,
            'currency_id' => $this->currency_id,
            'status' => $this->status,
            'personal_account' => $this->personal_account,
            'primary_account' => $this->primary_account,
            'bank_name' => $this->bank_name,
            'account_number' => $this->account_number,
            'routing_number' => $this->routing_number,
            'details_on_invoices' => $this->details_on_invoices,
            'balance' => $this->balance,
            'guess_explanations' => $this->guess_explanations,
            'sort_code' => $this->sort_code,
            'iban' => $this->iban,
            'bic' => $this->bic,
        ];
    }
}
