<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $table = 'accommodations';

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'price',
        'city',
        'latitude',
        'longitude',
        'capacity',
        'description',
    ];

    public $timestamps = true;

    public function categories()
    {
        return $this->belongToMany(Category::class, 'category_accommodation');
    }

    public function categoryAccommodation()
    {
        return $this->hasMany(CategoryAccommodation::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
