<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $category = 'Pakistani OST';

    private function songs(): array
    {
        // name, artist, image (in public/users/img), audio (in public/)
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

    public function up(): void
    {
        if (! Schema::hasTable('songs')) {
            return;
        }

        $now = now();

        foreach ($this->songs() as [$name, $artist, $image, $audio]) {
            // Re-running is safe: an existing OST row is updated, never duplicated.
            $existing = DB::table('songs')->where('name', $name)->where('category', $this->category)->first();

            if ($existing) {
                DB::table('songs')->where('id', $existing->id)->update([
                    'artist' => $artist, 'image' => $image, 'audio' => $audio, 'updated_at' => $now,
                ]);
            } else {
                DB::table('songs')->insert([
                    'name' => $name, 'artist' => $artist, 'image' => $image, 'audio' => $audio,
                    'category' => $this->category, 'created_at' => $now, 'updated_at' => $now,
                ]);
            }
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('songs')) {
            return;
        }

        DB::table('songs')
            ->where('category', $this->category)
            ->whereIn('name', array_column($this->songs(), 0))
            ->delete();
    }
};
