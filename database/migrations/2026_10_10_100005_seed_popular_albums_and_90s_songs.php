<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Adds the "Popular Albums" and "90's Playlist" songs to the `songs` table
 * (same way the Pakistani OST songs are stored). Covers already exist in public/users/img,
 * audio files are in public/users/music-files/popular-albums and /90s.
 * Safe to run more than once: an existing row is updated, never duplicated.
 * A row with an empty audio value has its cover shown but no audio file yet.
 */
return new class extends Migration
{
    private function songs(): array
    {
        // name, artist, image (public/users/img), audio (public/), category
        return [
            ["Finding Her", "Kushagra Thakur", "finder her.jpg", "users/music-files/popular-albums/finding-her.mp3", "Popular Albums"],
            ["Gal Sun", "Sabat Batin", "gal sun.jpg", "users/music-files/popular-albums/gal-sun.mp3", "Popular Albums"],
            ["Jhol", "Maanu and Annural Khalid", "jhol.png", "users/music-files/popular-albums/jhol.mp3", "Popular Albums"],
            ["Kalyani", "Shreya Ghoshal", "kalyani.jpg", "users/music-files/popular-albums/kalyani.mp3", "Popular Albums"],
            ["Sheesha", "Mitta Ror and Swara Verma", "sheesha.jpg", "users/music-files/popular-albums/sheesha.mp3", "Popular Albums"],
            ["Shaky", "Sanju Rathod", "shaky.jpg", "users/music-files/popular-albums/shaky.mp3", "Popular Albums"],
            ["Pal Pal", "Talwiinder", "pal pal.jpg", "users/music-files/popular-albums/pal-pal.mp3", "Popular Albums"],
            ["Tere Liye", "Atif Aslam", "tere liye.jpg", "users/music-files/popular-albums/tere-liye.mp3", "Popular Albums"],
            ["Sahiba", "Stebin Ben and Jasleen Royal", "sahiba.jpg", "users/music-files/popular-albums/sahiba.mp3", "Popular Albums"],
            ["Señorita", "Shawn Mendes", "senoriya.jpg", "users/music-files/popular-albums/senorita.mp3", "Popular Albums"],
            ["Sooraj Dooba Hain", "Arijit Singh and Aditi Singh Sharma", "soraj dooba h.jpg", "users/music-files/popular-albums/sooraj-dooba-hain.mp3", "Popular Albums"],
            ["Nahi Milta", "Asfar Hussain", "nhi milta.jpg", "users/music-files/popular-albums/nahi-milta.mp3", "Popular Albums"],
            ["Pasoori", "Ali Sethi and Shae Gill", "pasoroi.jpg", "users/music-files/popular-albums/pasoori.mp3", "Popular Albums"],
            ["Mashooqa", "Raghav Chaitanya, Mahmood, and Ruaa Kayy", "mashoqa1.webp", "users/music-files/popular-albums/mashooqa.mp3", "Popular Albums"],
            ["Mere Nishaan", "Darshan Raval", "mere nishan.jpg", "users/music-files/popular-albums/mere-nishaan.mp3", "Popular Albums"],
            ["Meri Jaan", "Neeti Mohan", "meri jaan.jpg", "users/music-files/popular-albums/meri-jaan.mp3", "Popular Albums"],
            ["Jugraafiya", "Udit Narayan and Shreya Ghoshal", "jugrafiya.jpg", "users/music-files/popular-albums/jugraafiya.mp3", "Popular Albums"],
            ["Haseen", "Talwiinder", "haseen.jpg", "users/music-files/popular-albums/haseen.mp3", "Popular Albums"],
            ["Barsaat", "Banjaare and Roni", "barsaat.jpg", "users/music-files/popular-albums/barsaat.mp3", "Popular Albums"],
            ["Chaleya", "Arijit Singh and Shilpa Rao", "chaleya.jpg", "users/music-files/popular-albums/chaleya.mp3", "Popular Albums"],
            ["Yeh Kaali Kaali Aankhen", "Kumar Sanu and Anu Malik", "kali kali ankhe.jpg", "users/music-files/90s/yeh-kaali-kaali-aankhen.mp3", "90's Playlist"],
            ["Pehla Nasha", "Udit Narayan and Sadhana Sargam", "phele nasha.jpg", "users/music-files/90s/pehla-nasha.mp3", "90's Playlist"],
            ["Jaadu Teri Nazar", "Udit Narayan", "jaadu teri nazar.jpg", "users/music-files/90s/jaadu-teri-nazar.mp3", "90's Playlist"],
            ["Tujhe Dekha To", "Kumar Sanu and Lata Mangeshkar", "tujhe dekha.jpg", "users/music-files/90s/tujhe-dekha-to.mp3", "90's Playlist"],
            ["Tan Tana Tan", "Abhijeet Bhattacharya and Poornima", "tan tana.jpg", "users/music-files/90s/tan-tana-tan.mp3", "90's Playlist"],
            ["O O Jaane Jaana", "Kamaal Khan", "oo jane jana.jpg", "users/music-files/90s/o-o-jaane-jaana.mp3", "90's Playlist"],
            ["Chaiyya Chaiyya", "Sukhwinder Singh and Sapna Awasthi", "chaiya.jpg", "users/music-files/90s/chaiyya-chaiyya.mp3", "90's Playlist"],
            ["Humko Humise Chura Lo", "Lata Mangeshkar and Udit Narayan", "humko hamai se.jpg", "users/music-files/90s/humko-humise-chura-lo.mp3", "90's Playlist"],
            ["Bahut Pyar Karte Hain", "Anuradha Paudwal", "bht pyar krtee.jpg", "users/music-files/90s/bahut-pyar-karte-hain.mp3", "90's Playlist"],
            ["Aankhon Se Tune Kya Keh Diya", "Alka Yagnik and Kumar Sanu", "ankho se.jpg", "users/music-files/90s/aankhon-se-tune-kya-keh-diya.mp3", "90's Playlist"],
            ["Do Dil Mil Rahe Hain", "Kumar Sanu", "dol dil.jpg", "", "90's Playlist"],
            ["Sochenge Tumhe Pyar", "Kumar Sanu and Nadeem Shravan", "sochnege.jpg", "users/music-files/90s/sochenge-tumhe-pyar.mp3", "90's Playlist"],
            ["Main Khiladi Tu Anari", "Abhijeet, Udit Narayan, and Anu Malik", "mai hu khiladi.jpg", "users/music-files/90s/main-khiladi-tu-anari.mp3", "90's Playlist"],
            ["Ankhiyon Se Goli Maare", "Sonu Nigam and Jaspinder Narula", "goli marai.jpg", "users/music-files/90s/ankhiyon-se-goli-maare.mp3", "90's Playlist"],
            ["Kuch Na Kaho", "Kumar Sanu", "kuch na kaho.jpg", "users/music-files/90s/kuch-na-kaho.mp3", "90's Playlist"],
            ["Ruk Ja O Dil Deewane", "Udit Narayan", "ruk ja.jpg", "", "90's Playlist"],
            ["Nazar Ke Samne", "Anuradha Paudwal and Kumar Sanu", "nazar k samne.jpg", "users/music-files/90s/nazar-ke-samne.mp3", "90's Playlist"],
            ["Baazigar O Baazigar", "Kumar Sanu and Alka Yagnik", "bazigar.jpg", "users/music-files/90s/baazigar-o-baazigar.mp3", "90's Playlist"],
            ["Ae Kash Ke Hum", "Jatin-Lalit and Kumar Sanu", "ae kash.jpg", "users/music-files/90s/ae-kash-ke-hum.mp3", "90's Playlist"],
            ["Mera Mann", "Jatin-Lalit and Kumar Sanu", "mera amn.jpg", "users/music-files/90s/mera-mann.mp3", "90's Playlist"],
        ];
    }

    public function up(): void
    {
        if (! Schema::hasTable('songs')) {
            return;
        }

        $now = now();

        foreach ($this->songs() as [$name, $artist, $image, $audio, $category]) {
            $existing = DB::table('songs')->where('name', $name)->where('category', $category)->first();

            if ($existing) {
                DB::table('songs')->where('id', $existing->id)->update([
                    'artist' => $artist, 'image' => $image, 'audio' => $audio, 'updated_at' => $now,
                ]);
            } else {
                DB::table('songs')->insert([
                    'name' => $name, 'artist' => $artist, 'image' => $image, 'audio' => $audio,
                    'category' => $category, 'created_at' => $now, 'updated_at' => $now,
                ]);
            }
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('songs')) {
            return;
        }

        DB::table('songs')->whereIn('category', ['Popular Albums', "90's Playlist"])->delete();
    }
};
