<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Coupon extends Model
{
    protected $fillable = ['code', 'name', 'discount_value', 'valid_from', 'expires_at', 'user_id'];

    public function scopeExpired(Builder $query)
    {
        return $query->where('expires_at','<', now());
    }

}

