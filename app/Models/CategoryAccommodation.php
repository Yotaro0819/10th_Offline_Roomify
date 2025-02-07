<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAccommodation extends Model
{
    protected $table = 'category_accommodation';
    public $timestamps = false;

    protected $fillable = ['accommodation_id', 'category_id'];
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
