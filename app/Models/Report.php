<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasUlids;
    protected $fillable = [
        'workshop_id',
        'report_type',
        'report_data',
        'photo',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
