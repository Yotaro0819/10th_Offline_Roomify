<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accommodation_id',
        'comment',
        'star'
    ];
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
