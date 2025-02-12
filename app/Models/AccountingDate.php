<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountingDate extends Model
{
    protected $fillable = [
        'company_start_date',
        'first_accounting_year_end_date',
        'app_start_date',
        'user_id',
    ];

    protected $casts = [
        'company_start_date' => 'date',
        'first_accounting_year_end_date' => 'date',
        'app_start_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
