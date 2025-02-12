<?php

namespace App\Models;

use App\Models\bill;
use App\Models\invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'name',
        'organisation',
        'email',
        'billing_email',
        'telephone',
        'mobile_number',
        'address',
        'town',
        'region',
        'zip_code',
        'country',
        'default_payment_terms',
        'sales_tax_registration_number',
        'invoice_language',
        'tenant_id',
        'contact_level_email',
        'contact_level_invoice',
        'display_contact_name',
    ];

    public function invoices()
    {
        return $this->hasMany(invoice::class);
    }

    public function bills()
    {
        return $this->hasMany(bill::class);
    }


    public function scopeTenant($query){
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }
    
}
