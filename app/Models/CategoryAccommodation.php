<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAccommodation extends Model
{
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
