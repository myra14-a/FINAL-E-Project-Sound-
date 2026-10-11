<?php

namespace App\Models;

use App\Support\CoverImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

class MediaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'title', 'artist', 'album', 'year',
        'description', 'file_path', 'thumbnail_path', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'year' => 'integer',
    ];

    public function reviews(): HasMany { return $this->hasMany(Review::class); }

    public function ratings(): HasMany { return $this->hasMany(Rating::class); }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_media_item');
    }

    // Titles stored by the admin that differ from the song title, keyed by normalized title.
    private const SONG_ALIASES = [
        'dilhaara' => 'mannatmurad',
        'baat' => 'meemsemohabbat',
        'chaldiyetumkahan' => 'kabhimainkabhitum',
        'teramerahaipyar' => 'ishqmurshid',
    ];

    private static ?array $songIndex = null;

    private static function normalizeTitle(?string $value): string
    {
        $value = preg_replace('/\b(ost|original score|original soundtrack)\b/i', ' ', (string) $value);

        return preg_replace('/[^a-z0-9]+/i', '', strtolower($value));
    }

    private static function songIndex(): array
    {
        if (self::$songIndex === null) {
            self::$songIndex = [];
            if (Schema::hasTable('songs')) {
                foreach (Song::visible()->orderBy('id')->get() as $song) {
                    self::$songIndex[self::normalizeTitle($song->name)] = $song;
                }
            }
        }

        return self::$songIndex;
    }

    private static ?array $hiddenIds = null;

    /**
     * Pakistani OST cleanup: a music item is hidden from public pages when it duplicates an
     * OST song from the songs table, or when it is an OST item whose cover/audio file is missing.
     */
    public static function hiddenIds(): array
    {
        if (self::$hiddenIds === null) {
            self::$hiddenIds = self::where('type', 'music')->with('categories')->get()
                ->filter(fn (self $item) => $item->isHiddenOst())
                ->pluck('id')->all();
        }

        return self::$hiddenIds;
    }

    public function scopeVisible($query)
    {
        $hidden = self::hiddenIds();

        return $hidden ? $query->whereNotIn('media_items.id', $hidden) : $query;
    }

    public function isPakistaniOst(): bool
    {
        return stripos((string) $this->title, 'ost') !== false
            || stripos((string) $this->album, 'ost') !== false
            || $this->categories->contains(fn ($c) => stripos((string) $c->name, 'ost') !== false);
    }

    public function hasWorkingFiles(): bool
    {
        // Own cover must be a real image (not missing, not the SOUND logo) and the audio file must exist.
        return CoverImage::isRealUpload($this->thumbnail_path) && $this->file_path
            && file_exists(public_path('storage/' . $this->file_path));
    }

    public function isHiddenOst(): bool
    {
        if ($this->type !== 'music') {
            return false;
        }

        if ($this->matchedSong()) {
            return true; // duplicate of an OST song that already has its own audio + cover
        }

        // An OST item without its own real cover image is hidden.
        return $this->isPakistaniOst() && ! CoverImage::isRealUpload($this->thumbnail_path);
    }

    /** The songs-table record (audio + cover) that this music item corresponds to, if any. */
    public function matchedSong(): ?Song
    {
        if ($this->type !== 'music') {
            return null;
        }

        $songs = self::songIndex();
        $key = self::normalizeTitle($this->title);
        if ($key === '') {
            return null;
        }
        if (isset($songs[$key])) {
            return $songs[$key];
        }
        if (isset(self::SONG_ALIASES[$key], $songs[self::SONG_ALIASES[$key]])) {
            return $songs[self::SONG_ALIASES[$key]];
        }
        if (strlen($key) >= 6) {
            foreach ($songs as $songKey => $song) {
                if (strlen($songKey) >= 6 && levenshtein($key, $songKey) <= 2) {
                    return $song;
                }
            }
        }

        return null;
    }

    public function getFileUrlAttribute(): string
    {
        if ($this->file_path && file_exists(public_path('storage/' . $this->file_path))) {
            return asset('storage/' . $this->file_path);
        }

        // Uploaded file is missing on disk: play the matching OST song file instead.
        $song = $this->matchedSong();

        return $song ? asset(ltrim($song->audio, '/')) : asset('storage/' . $this->file_path);
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail_path && file_exists(public_path('storage/' . $this->thumbnail_path))) {
            return asset('storage/' . $this->thumbnail_path);
        }

        // No (or missing) thumbnail: use the cover image of the matching OST song.
        $song = $this->matchedSong();
        if ($song) {
            return asset('users/img/' . ltrim($song->image, '/'));
        }

        return $this->thumbnail_path ? asset('storage/' . $this->thumbnail_path) : null;
    }
}
