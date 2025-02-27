<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'accommodation_id',
        'image',
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
}
