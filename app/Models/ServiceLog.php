<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceLog extends Model
{
    use HasUlids;
    protected $fillable = [
        'service_id',
        'mechanic_id',
        'transaction_id',
        'notes',
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function mechanic(){
        return $this->belongsTo(User::class, 'mechanic_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
