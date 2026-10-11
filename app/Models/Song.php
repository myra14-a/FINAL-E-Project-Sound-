<?php

namespace App\Models;

use App\Support\CoverImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Song extends Model
{
    protected $fillable = [
        'name',
        'artist',
        'image',
        'audio',
        'category',
    ];

    private static ?array $hiddenIds = null;

    public function isOst(): bool
    {
        return stripos((string) $this->category, 'ost') !== false
            || stripos((string) $this->category, 'pakistani') !== false
            || preg_match('/\bost\b/i', (string) $this->name) === 1;
    }

    /** An OST song is hidden everywhere when it has no real cover image (missing file or SOUND logo). */
    public function isHiddenOst(): bool
    {
        return $this->isOst() && ! CoverImage::isRealSongCover($this->image);
    }

    public static function hiddenIds(): array
    {
        if (self::$hiddenIds === null) {
            self::$hiddenIds = Schema::hasTable('songs')
                ? self::query()->get()->filter(fn (self $song) => $song->isHiddenOst())->pluck('id')->all()
                : [];
        }

        return self::$hiddenIds;
    }

    public function scopeVisible($query)
    {
        $hidden = self::hiddenIds();

        return $hidden ? $query->whereNotIn('songs.id', $hidden) : $query;
    }
}
