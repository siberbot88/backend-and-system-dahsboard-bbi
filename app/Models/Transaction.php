<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUlids;
    protected $fillable = [
        'code',
        'customer_id',
        'workshop_id',
        'admin_id',
        'mechanic_id',
        'status',
        'total_price',
        'payment_method',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function mechanic(){
        return $this->belongsTo(User::class, 'mechanic_id');
    }

    public function items(){
        return $this->hasMany(TransactionItem::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
