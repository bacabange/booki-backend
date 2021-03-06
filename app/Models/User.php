<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Book;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $appends = ['token_jwt'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Set Attributes
    public function setPasswordAttribute($value)
    {
        if (! empty($value)) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

    // Get Attributer
    public function getTokenJwtAttribute()
    {
        return \JWTAuth::fromUser($this);
    }
}
