<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    /**
     * Get the user that authored the blog post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }
} 