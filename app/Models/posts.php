<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    /** Establishing relationships */
    /**
     * Get all of the comments for the posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    /**
     * Get all of the postTag for the posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postTag(): HasMany
    {
        return $this->hasMany(postTag::class);
    }

    /**
     * Get the user that owns the posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
