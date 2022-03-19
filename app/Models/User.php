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
     * Get all of the pastes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pastes()
    {
        return $this->hasMany(Paste::class);
    }
}
