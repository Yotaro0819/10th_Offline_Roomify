<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'receiver_id',
        'notification',
        'title',
        'status'
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
