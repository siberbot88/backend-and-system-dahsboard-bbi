<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasUlids;
    protected $fillable = [
        'code',
        'workshop_id',
        'name',
        'description',
        'price',
        'scheduled_date',
        'estimated_time',
        'status',
    ];

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    public function items(){
        return $this->hasMany(TransactionItem::class);
    }
}
