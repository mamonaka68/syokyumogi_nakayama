<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
     /*   'date', */
        'break_start',
        'break_end'
    ];

    public function works()
    {
        return $this->belongsTo(Work::class);
    }
}
