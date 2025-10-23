<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasUlids;
    protected $fillable = [
        'code',
        'workshop_id',
        'title',
        'description',
        'discount_type',
        'discount_value',
        'quota',
        'min_transaction',
        'valid_from',
        'valid_until',
        'is_active',
    ];

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }
}
