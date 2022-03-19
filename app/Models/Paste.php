<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    protected $table = 'pastes';

    protected $fillable = [
        'title',
        'author',
        'language',
        'url',
        'expiration',
        'content',
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
