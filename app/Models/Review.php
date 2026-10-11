<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['user_id', 'media_item_id', 'review'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function mediaItem(): BelongsTo { return $this->belongsTo(MediaItem::class); }
}
