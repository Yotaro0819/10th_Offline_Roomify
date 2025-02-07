<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashtagAccommodation extends Model
{

    protected $table = 'hashtag_accommodation';
    public $timestamps = false;

    protected $fillable = ['accommodation_id', 'hashtag_name'];
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
    public function hashtag()
    {
        return $this->belongsTo(Hashtag::class);
    }
}
