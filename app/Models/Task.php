<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasUlids;
    protected $fillable = [
        'transaction_id',
        'mechanic_id',
        'assigned_by',
        'status',
        'description',
        'assigned_at',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function mechanic(){
        return $this->belongsTo(User::class, 'mechanic_id');
    }

    public function assignedBy(){
        return $this->belongsTo(User::class , 'assigned_by');
    }
}
