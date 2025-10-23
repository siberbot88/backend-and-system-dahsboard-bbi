<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory,HasUlids;
    protected $fillable = [
        'code',
        'owner_id',
        'name',
        'description',
        'address',
        'phone',
        'email',
        'photo',
        'longitude',
        'latitude',
        'open_time',
        'close_time',
        'operational_day',
        'is_active',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    //Relasi kedua
    public function document(){
        return $this->hasOne(WorkshopDocument::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function employees(){
        return $this->hasMany(WorkshopEmployee::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function vouchers(){
        return $this->hasMany(Voucher::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
