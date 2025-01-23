<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = "users";

    public $timestamps = true;

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
        return $this->belongsTo(Nationality::class);
    }


}
