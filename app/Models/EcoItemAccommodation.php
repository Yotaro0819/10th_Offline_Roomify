<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcoitemAccommodation extends Model
{
    public $timestamps = false;

    protected $fillable = ['ecoitem_id', 'accommodation_id'];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
    public function ecoitem()
    {
        return $this->belongsTo(Ecoitem::class);
    }
}
