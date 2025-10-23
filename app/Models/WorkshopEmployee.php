<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class WorkshopEmployee extends Model
{
    use HasUlids;
    protected $fillable = [
        'workshop_id',
        'user_id',
        'position',
        'job_title',
        'status',
    ];

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
