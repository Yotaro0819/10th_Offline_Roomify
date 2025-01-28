<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{


    public $timestamps = false;

    // fillable に name を追加
    protected $fillable = ['name'];


    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'hashtag_accommodation');
    }

    public function hashtagAccommodation() {
        return $this->hasMany(HashtagAccommodation::class);
    }

}
