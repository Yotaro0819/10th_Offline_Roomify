<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoitem extends Model
{
    use HasFactory;

    protected $table = "ecoitems";

    protected $fillable = ['ecoitem_name', 'point'];

    public $timestamps = false;

    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'ecoitem_accommodation');
    }

    public function ecoItemAccommodation() {
        return $this->hasMany(EcoitemAccommodation::class);
    }

}
