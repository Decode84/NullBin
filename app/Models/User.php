<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getAvatarPathAttribute()
    {
        return 'https://ui-avatars.com/api/'. implode('/', [
            urlencode($this->username), 
            200, // image size
            'EBF4FF', // background color
            '7F9CF5', // font color
        ]);
    }

    /**
     * Get all of the pastes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pastes()
    {
        return $this->hasMany(Paste::class);
    }
}
