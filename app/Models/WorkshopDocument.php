<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class WorkshopDocument extends Model
{
    use HasUlids;
    protected $fillable = [
        'nib',
        'workshop_id',
        'npwp',
    ];

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }
}
