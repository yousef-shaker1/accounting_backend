<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'account_name',
        'currency_id',
        'status',
        'personal_account',
        'primary_account',
        'bank_name',
        'account_number',
        'routing_number',
        'details_on_invoices',
        'balance',
        'guess_explanations',
        'sort_code',
        'iban',
        'bic',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeFindTenant($query){
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }
}
