<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Paste extends Model
{
    protected $fillable = [
        'title',
        'author',
        'language',
        'url',
        'expiration',
        'content',
        'user_id',
        'is_encrypted',
        'visibility',
    ];

    protected $casts = [
        'expiration',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
    }

    /**
     * Get a string path for the article.
     *
     * @return string
     */
    public function path()
    {
        return "/{$this->url}/";
    }

    public function scopeWhereVisibility(Builder $query, $visibility)
    {
        return $query->where('visibility', $visibility);
    }

    public function scopeWhereExpired(Builder $query)
    {
        return $query->where(function ($query) {
            $query->whereNull('expiration')
                ->orWhere('expiration', '>', now());
        });
    }

    /**
     * Get the user that owns the Paste
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the language associated with the Paste
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(Language::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
