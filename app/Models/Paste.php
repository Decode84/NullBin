<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    const ACCESS_PULBIC = 'public';
    const ACCESS_UNLISTED = 'unlisted';
    const ACCESS_PRIVATE = 'private';

    protected $fillable = [
        'title',
        'author',
        'language',
        'url',
        'expiration',
        'content',
        'user_id',
    ];

    protected $dates = [
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

    static public function accessStates()
    {
        return [
            self::ACCESS_PULBIC,
            self::ACCESS_UNLISTED,
            self::ACCESS_PRIVATE
        ];
    }

    public function scopePublic($query)
    {
        return $query->where('access', self::ACCESS_PULBIC);
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
}
