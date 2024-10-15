<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingItem extends Model
{
    /** @use HasFactory<\Database\Factories\RatingItemFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'rating_id',
    ];

    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }
}
