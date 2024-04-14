<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
    ];

    /** Establishing relationships */
    /**
     * Get the user that owns the comments
     *
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the posts that owns the comments
     *
     * 
     */
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
