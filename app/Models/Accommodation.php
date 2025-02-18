<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class Accommodation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'accommodations';

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'price',
        'city',
        'latitude',
        'longitude',
        'rank',
        'capacity',
        'description',
    ];

    public $timestamps = true;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_accommodation');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'hashtag_accommodation');
    }

    public function ecoitems()
    {
        return $this->belongsToMany(Ecoitem::class, 'ecoitem_accommodation');
    }

    public function categoryAccommodation()
    {
        return $this->hasMany(CategoryAccommodation::class);
    }

    public function hashtagAccommodation()
    {
        return $this->hasMany(HashtagAccommodation::class);
    }

    public function ecoitemAccommodation()
    {
        return $this->hasMany(EcoitemAccommodation::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->latest()->withTrashed();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'booking');
    }
}
