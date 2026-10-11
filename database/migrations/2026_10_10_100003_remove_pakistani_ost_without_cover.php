<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

/**
 * Permanently deletes every Pakistani OST song that has no real cover image
 * (empty image, missing image file, or only the SOUND logo / default placeholder).
 */
return new class extends Migration
{
    private array $placeholders = ['weblogo.png', 'logo.png', 'play-default.png', 'play.png', 'pause.png'];

    private function isPlaceholder(?string $path): bool
    {
        return $path !== null && in_array(strtolower(basename($path)), $this->placeholders, true);
    }

    public function up(): void
    {
        $removedSongs = 0;
        $removedMedia = 0;

        // ---- songs table ----
        if (Schema::hasTable('songs')) {
            $ids = [];
            foreach (DB::table('songs')->get() as $song) {
                $isOst = stripos((string) $song->category, 'ost') !== false
                    || stripos((string) $song->category, 'pakistani') !== false
                    || stripos((string) $song->name, 'ost') !== false;
                if (! $isOst) {
                    continue;
                }

                $image = trim((string) $song->image);
                if ($image === '' || $this->isPlaceholder($image) || ! file_exists(public_path('users/img/' . ltrim($image, '/')))) {
                    $ids[] = $song->id;
                }
            }
            if ($ids) {
                DB::table('songs')->whereIn('id', $ids)->delete();
                $removedSongs = count($ids);
            }
        }

        // ---- media_items table (admin-uploaded music) ----
        if (Schema::hasTable('media_items')) {
            $categoryNames = [];
            if (Schema::hasTable('category_media_item') && Schema::hasTable('categories')) {
                $links = DB::table('category_media_item')
                    ->join('categories', 'categories.id', '=', 'category_media_item.category_id')
                    ->select('category_media_item.media_item_id', 'categories.name')->get();
                foreach ($links as $link) {
                    $categoryNames[$link->media_item_id][] = $link->name;
                }
            }

            $ids = [];
            foreach (DB::table('media_items')->where('type', 'music')->get() as $item) {
                $isOst = stripos((string) $item->title, 'ost') !== false
                    || stripos((string) $item->album, 'ost') !== false;
                foreach ($categoryNames[$item->id] ?? [] as $categoryName) {
                    if (stripos((string) $categoryName, 'ost') !== false) {
                        $isOst = true;
                    }
                }
                if (! $isOst) {
                    continue;
                }

                $thumb = trim((string) $item->thumbnail_path);
                if ($thumb === '' || $this->isPlaceholder($thumb) || ! Storage::disk('public')->exists($thumb)) {
                    $ids[] = $item->id;
                }
            }

            if ($ids) {
                foreach (['category_media_item', 'reviews', 'ratings'] as $related) {
                    if (Schema::hasTable($related)) {
                        DB::table($related)->whereIn('media_item_id', $ids)->delete();
                    }
                }
                DB::table('media_items')->whereIn('id', $ids)->delete();
                $removedMedia = count($ids);
            }
        }

        Log::info("Pakistani OST cover cleanup: removed {$removedSongs} song rows and {$removedMedia} media items without a cover image.");
    }

    public function down(): void
    {
        // Deleted rows cannot be restored.
    }
};
