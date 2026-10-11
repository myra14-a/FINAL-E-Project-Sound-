<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/**
 * Pakistani OST cleanup.
 *  - Keeps exactly ONE record per OST song in the `songs` table (the one with its own cover + audio).
 *  - Deletes duplicate OST rows from `songs` and `media_items`.
 *  - Deletes OST rows whose cover image / audio file is missing.
 */
return new class extends Migration
{
    private string $category = 'Pakistani OST';

    // name, artist, image (public/users/img), audio (public/)
    private function canonical(): array
    {
        return [
            ['Meem Se Mohabbat', 'Asim Azhar and Qirat Haider', 'meem se mohabbat.jpg', 'users/music-files/ost/meem-se-mohabbat.mp3'],
            ['Dar E Nijaat', 'Nabeel Shaukat Ali and Osaf Fateh Ali Khan', 'dar e nijat.jpg', 'users/music-files/ost/dar-e-nijaat.mp3'],
            ['Kabhi Main Kabhi Tum', 'Ahad Khan and Usama Ali', 'kabhi mai kabhi tum.jpg', 'users/music-files/ost/kabhi-main-kabhi-tum.mp3'],
            ['Ishq Murshid', 'Ahmed Jahanzeb', 'ishq mrshid.jpg', 'users/music-files/ost/ishq-murshid.mp3'],
            ['Meri Zindagi Hai Tu', 'Asim Azhar', 'meri zindagi h tu.jpg', 'users/music-files/ost/meri-zindagi-hai-tu.mp3'],
            ['Deewangi', 'Sahir Ali Bagga', 'dewangi.jpg', 'users/music-files/ost/deewangi.mp3'],
            ['Fitoor', 'Shani Arshad and Aima Baig', 'fitoor.jpg', 'users/music-files/ost/fitoor.mp3'],
            ['Humsafar', 'Qurat-ul-Ain Balouch', 'humsafar.jpg', 'users/music-files/ost/humsafar.mp3'],
            ['Khuda Aur Mohabbat', 'Rahat Fateh Ali Khan and Nish Asher', 'khuda aur mohaabt.jpg', 'users/music-files/ost/khuda-aur-mohabbat.mp3'],
            ['Khumar', 'Sahir Ali Bagga', 'khumar.jpg', 'users/music-files/ost/khumar.mp3'],
            ['Humrahi', 'Muhammad Ali', 'humrahi.jpg', 'users/music-files/ost/humrahi.mp3'],
            ['Dayan', 'Shani Arshad', 'dayan.jpg', 'users/music-files/ost/dayan.mp3'],
            ['Mannat Murad', 'Asim Azhar', 'mannat murad.jpg', 'users/music-files/ost/mannat-murad.mp3'],
            ['Mohra', 'Yashal Shahid', 'mohra.jpg', 'users/music-files/ost/mohra.mp3'],
            ['Naqaab', 'Yashal Shahid', 'naqaab.jpg', 'users/music-files/ost/naqaab.mp3'],
            ['Parizaad', 'Syed Asrar Shah', 'parizaad.jpg', 'users/music-files/ost/parizaad.mp3'],
            ['Sirf Tum', 'Shani Arshad', 'sirf tum.jpg', 'users/music-files/ost/sirf-tum.mp3'],
            ['Anaa', 'Sahir Ali Bagga and Hania Amir', 'aana.jpg', 'users/music-files/ost/anaa.mp3'],
            ['Humraazi', 'Wajhi Farooki', 'humrazi.jpg', 'users/music-files/ost/humraazi.mp3'],
            ['Tere Bin', 'Shani Arshad', 'tere bin.jpg', 'users/music-files/ost/tere-bin.mp3'],
        ];
    }

    // Other titles used for the same songs, keyed by normalized title.
    private array $aliases = [
        'dilhaara' => 'mannatmurad',
        'baat' => 'meemsemohabbat',
        'chaldiyetumkahan' => 'kabhimainkabhitum',
        'teramerahaipyar' => 'ishqmurshid',
    ];

    private function key(?string $value): string
    {
        $value = preg_replace('/\b(ost|original score|original soundtrack)\b/i', ' ', (string) $value);

        return preg_replace('/[^a-z0-9]+/i', '', strtolower($value));
    }

    /** Returns the canonical song key a title belongs to, or null. */
    private function canonicalKey(string $key, array $canonKeys): ?string
    {
        if ($key === '') {
            return null;
        }
        if (isset($canonKeys[$key])) {
            return $key;
        }
        if (isset($this->aliases[$key]) && isset($canonKeys[$this->aliases[$key]])) {
            return $this->aliases[$key];
        }
        if (strlen($key) >= 6) {
            foreach (array_keys($canonKeys) as $candidate) {
                if (strlen($candidate) >= 6 && levenshtein($key, $candidate) <= 2) {
                    return $candidate;
                }
            }
        }

        return null;
    }

    public function up(): void
    {
        $canon = [];
        foreach ($this->canonical() as $row) {
            $canon[$this->key($row[0])] = $row;
        }

        $removedSongs = 0;
        $removedMedia = 0;

        // ---- songs table: one row per OST song, and drop image-less OST rows ----
        if (Schema::hasTable('songs')) {
            $groups = [];
            $others = [];
            foreach (DB::table('songs')->orderBy('id')->get() as $song) {
                $isOstRow = stripos((string) $song->category, 'ost') !== false
                    || stripos((string) $song->category, 'pakistani') !== false
                    || stripos((string) $song->name, 'ost') !== false;
                $ck = $isOstRow ? $this->canonicalKey($this->key($song->name), $canon) : null;
                if ($ck !== null) {
                    $groups[$ck][] = $song;
                } elseif ($isOstRow) {
                    $others[] = $song;
                }
            }

            foreach ($canon as $ck => [$name, $artist, $image, $audio]) {
                $rows = $groups[$ck] ?? [];
                $keep = null;
                foreach ($rows as $row) {
                    if ($row->name === $name && $row->category === $this->category) {
                        $keep = $row;
                        break;
                    }
                }
                $keep ??= $rows[0] ?? null;

                $data = ['name' => $name, 'artist' => $artist, 'image' => $image, 'audio' => $audio,
                         'category' => $this->category, 'updated_at' => now()];
                if ($keep) {
                    DB::table('songs')->where('id', $keep->id)->update($data);
                } else {
                    DB::table('songs')->insert($data + ['created_at' => now()]);
                }

                foreach ($rows as $row) {
                    if (! $keep || $row->id !== $keep->id) {
                        DB::table('songs')->where('id', $row->id)->delete();
                        $removedSongs++;
                    }
                }
            }

            // Other OST rows that are not one of the 20 songs: remove only if cover or audio is missing.
            foreach ($others as $row) {
                $imageOk = $row->image && file_exists(public_path('users/img/' . ltrim($row->image, '/')));
                $audioOk = $row->audio && file_exists(public_path(ltrim($row->audio, '/')));
                if (! $imageOk || ! $audioOk) {
                    DB::table('songs')->where('id', $row->id)->delete();
                    $removedSongs++;
                }
            }
        }

        // ---- media_items: remove OST duplicates and OST rows with missing files ----
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

            $delete = [];
            foreach (DB::table('media_items')->where('type', 'music')->get() as $item) {
                $isDuplicate = $this->canonicalKey($this->key($item->title), $canon) !== null;

                $isOst = stripos((string) $item->title, 'ost') !== false
                    || stripos((string) $item->album, 'ost') !== false;
                foreach ($categoryNames[$item->id] ?? [] as $categoryName) {
                    if (stripos((string) $categoryName, 'ost') !== false) {
                        $isOst = true;
                    }
                }

                $filesOk = $item->thumbnail_path && $item->file_path
                    && file_exists(public_path('storage/' . $item->thumbnail_path))
                    && file_exists(public_path('storage/' . $item->file_path));

                if ($isDuplicate || ($isOst && ! $filesOk)) {
                    $delete[] = $item->id;
                }
            }

            if ($delete) {
                foreach (['category_media_item', 'reviews', 'ratings'] as $related) {
                    if (Schema::hasTable($related)) {
                        DB::table($related)->whereIn('media_item_id', $delete)->delete();
                    }
                }
                DB::table('media_items')->whereIn('id', $delete)->delete();
                $removedMedia = count($delete);
            }
        }

        Log::info("Pakistani OST cleanup: removed {$removedSongs} duplicate/broken song rows and {$removedMedia} duplicate/broken media items.");
    }

    public function down(): void
    {
        // Deleted duplicates cannot be restored.
    }
};
