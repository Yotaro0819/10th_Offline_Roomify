<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = "users";

    public $titmestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'nationality_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    const ROLE_ADMIN = 0;
    const ROLE_GUEST = 1;
    const ROLE_HOST  = 2;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function roles()
    {
        return [
            self::ROLE_ADMIN => 'admin',
            self::ROLE_GUEST => 'guest',
            self::ROLE_HOST  => 'host',
        ];
    }

    public function getRole($value)
    {
        return self::roles()[$value];
    }

    public function nationality() {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function accommodations(){
        return $this->hasMany(Accommodation::class)->latest()->withTrashed();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage($userId)
    {
        return Message::where(function($query) use ($userId) {
                    // 現在のユーザーが送信者、他のユーザーが受信者
                    $query->where('sender_id', $this->id)
                        ->where('receiver_id', $userId);
                })
                ->orWhere(function($query) use ($userId) {
                    // 他のユーザーが送信者、現在のユーザーが受信者
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $this->id);
                })
                ->latest() // 最新のメッセージを取得
                ->first(); // 一番最新のメッセージを取得
    }

    public function guestbookings()
    {
        $this->hasMany(Booking::class, 'guest_id');
    }

    public function hostBookings()
    {
        $this->hasMany(Booking::class, 'host_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'receiver_id');
    }

}
