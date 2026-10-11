<?php

use App\Support\CoverImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/**
 * Permanently deletes every Pakistani OST song that has NO real cover image:
 *  - no image / image file missing on disk
 *  - cover is the SOUND logo (checked by file name AND file content)
 * Runs on both the `songs` table and admin-uploaded `media_items`.
 */
return new class extends Migration
{
    public function up(): void
    {
        $removedSongs = 0;
        $removedMedia = 0;

        if (Schema::hasTable('songs')) {
            $ids = [];
            foreach (DB::table('songs')->get() as $song) {
                $isOst = stripos((string) $song->category, 'ost') !== false
                    || stripos((string) $song->category, 'pakistani') !== false
                    || stripos((string) $song->name, 'ost') !== false;

                if ($isOst && ! CoverImage::isRealSongCover($song->image)) {
                    $ids[] = $song->id;
                }
            }
            if ($ids) {
                DB::table('songs')->whereIn('id', $ids)->delete();
                $removedSongs = count($ids);
            }
        }

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

                if ($isOst && ! CoverImage::isRealUpload($item->thumbnail_path)) {
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

        Log::info("OST real-cover cleanup: removed {$removedSongs} songs and {$removedMedia} media items without a real cover.");
    }

    public function down(): void
    {
        // Deleted rows cannot be restored.
    }
};
