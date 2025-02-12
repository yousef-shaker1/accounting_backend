<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $fillable = ['name', 'domain', 'database'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
