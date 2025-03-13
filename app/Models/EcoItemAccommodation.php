<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcoItemAccommodation extends Model
{
    protected $table = 'ecoitem_accommodation';
    public $timestamps = false;

    protected $fillable = ['ecoitem_id', 'accommodation_id'];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
    public function ecoitem()
    {
        return $this->belongsTo(EcoItem::class);
    }
}
