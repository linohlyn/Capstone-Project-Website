<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
    ];

    /**Establishing Relationships*/
    /**
     * Get the userTag that owns the tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userTag(): BelongsTo
    {
        return $this->belongsTo(userTag::class);
    }

    /**
     * Get the postTag that owns the tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postTag(): BelongsTo
    {
        return $this->belongsTo(postTag::class);
    }
}
