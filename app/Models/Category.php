<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = ['category_name'];

    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'category_accommodation');
    }

    public function categoryAccommodation() {
        return $this->hasMany(CategoryAccommodation::class);
    }


}
