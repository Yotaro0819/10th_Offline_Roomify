<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Accommodation extends Model
{
    public function categories()
    {
        return $this->belongToMany(Category::class, 'category_accommodation');
    }

    public function categoryAccommodation() {
        return $this->hasMany(categoryAccommodation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
