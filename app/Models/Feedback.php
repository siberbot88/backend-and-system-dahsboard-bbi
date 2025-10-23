<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasUlids;
    protected $fillable = [
        'transaction_id',
        'rating',
        'comment',
        'submitted_at',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
