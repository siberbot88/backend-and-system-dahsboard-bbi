<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasUlids;
    protected $fillable = [
        'transaction_id',
        'service_id',
        'price',
        'quantity',
        'subtotal',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
