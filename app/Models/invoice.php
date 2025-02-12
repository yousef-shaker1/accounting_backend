<?php

namespace App\Models;
 
use App\Models\Contact;
use App\Models\Business;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'contact_id',
        'business_id',
        'invoice_reference',
        'invoice_date',
        'payment_terms',
        'currency_id',
        'additional_text',
        'invoice_discount',
        'custom_contact_name',
        'custom_payment_terms',
        'po_reference',
        'amount',
        'status',
        'is_letterheaded',
        'display_project_name',
        'display_bic_iban',
    ];

    
    protected $attributes = [
        'is_letterheaded' => 0,
        'display_project_name' => 0,
        'display_bic_iban' => 0,
    ];
    
    
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeTenant($query){
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }
}
