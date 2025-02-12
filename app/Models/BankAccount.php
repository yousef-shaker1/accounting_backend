<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'account_name',
        'bank_name',
        'account_number',
        'sort_code',
        'opening_balance',
        'user_id',
    ];
}
