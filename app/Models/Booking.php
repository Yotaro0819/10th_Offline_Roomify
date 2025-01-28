<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function specialRequest()
    {
        return $this->hasOne(SpecialRequest::class);
    }
}
