<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\Business; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'business_id',
        'contact_id',
        'reference',
        'bill_date',
        'due_on',
        'currency_id',
        'is_tax_included',
        'comment',
        'item_category_type',
        'business_category_id',
        'total_price',
        'bill_recurs',
        'file',
        'attachment_description',
    ];
    
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function scopeFindTenant($query){
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }
}
