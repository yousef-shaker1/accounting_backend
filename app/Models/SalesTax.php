<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesTax extends Model
{
    protected $fillable = [
        'is_registered',
        'effective_from',
        'name',
        'tax_rate',
        'user_id',
    ];
}
