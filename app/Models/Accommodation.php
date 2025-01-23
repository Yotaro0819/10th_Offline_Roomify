<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public function categories()
    {
        return $this->belongToMany(Category::class, 'category_accommodation');
    }
}
