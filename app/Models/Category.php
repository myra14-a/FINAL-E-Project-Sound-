<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name'];

    public function mediaItems(): BelongsToMany
    {
        return $this->belongsToMany(MediaItem::class, 'category_media_item');
    }
}
