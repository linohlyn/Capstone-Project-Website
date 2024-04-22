<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    /** Establishing relationships */
    /**
     * Get all of the comments for the posts
     *
     * 
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    /**
     * Get all of the postTag for the posts
     *
     * 
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
