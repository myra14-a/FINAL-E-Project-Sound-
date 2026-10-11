-- Pakistani OST songs: run this in phpMyAdmin (database `sound`) > SQL tab,
-- ONLY if you did not run `php artisan migrate`. Safe to run more than once.
USE sound;
DELETE FROM songs WHERE category='Pakistani OST' AND name IN ('Meem Se Mohabbat', 'Dar E Nijaat', 'Kabhi Main Kabhi Tum', 'Ishq Murshid', 'Meri Zindagi Hai Tu', 'Deewangi', 'Fitoor', 'Humsafar', 'Khuda Aur Mohabbat', 'Khumar', 'Humrahi', 'Dayan', 'Mannat Murad', 'Mohra', 'Naqaab', 'Parizaad', 'Sirf Tum', 'Anaa', 'Humraazi', 'Tere Bin');
INSERT INTO songs (name, artist, image, audio, category, created_at, updated_at) VALUES
('Meem Se Mohabbat','Asim Azhar and Qirat Haider','meem se mohabbat.jpg','users/music-files/ost/meem-se-mohabbat.mp3','Pakistani OST',NOW(),NOW()),
('Dar E Nijaat','Nabeel Shaukat Ali and Osaf Fateh Ali Khan','dar e nijat.jpg','users/music-files/ost/dar-e-nijaat.mp3','Pakistani OST',NOW(),NOW()),
('Kabhi Main Kabhi Tum','Ahad Khan and Usama Ali','kabhi mai kabhi tum.jpg','users/music-files/ost/kabhi-main-kabhi-tum.mp3','Pakistani OST',NOW(),NOW()),
('Ishq Murshid','Ahmed Jahanzeb','ishq mrshid.jpg','users/music-files/ost/ishq-murshid.mp3','Pakistani OST',NOW(),NOW()),
('Meri Zindagi Hai Tu','Asim Azhar','meri zindagi h tu.jpg','users/music-files/ost/meri-zindagi-hai-tu.mp3','Pakistani OST',NOW(),NOW()),
('Deewangi','Sahir Ali Bagga','dewangi.jpg','users/music-files/ost/deewangi.mp3','Pakistani OST',NOW(),NOW()),
('Fitoor','Shani Arshad and Aima Baig','fitoor.jpg','users/music-files/ost/fitoor.mp3','Pakistani OST',NOW(),NOW()),
('Humsafar','Qurat-ul-Ain Balouch','humsafar.jpg','users/music-files/ost/humsafar.mp3','Pakistani OST',NOW(),NOW()),
('Khuda Aur Mohabbat','Rahat Fateh Ali Khan and Nish Asher','khuda aur mohaabt.jpg','users/music-files/ost/khuda-aur-mohabbat.mp3','Pakistani OST',NOW(),NOW()),
('Khumar','Sahir Ali Bagga','khumar.jpg','users/music-files/ost/khumar.mp3','Pakistani OST',NOW(),NOW()),
('Humrahi','Muhammad Ali','humrahi.jpg','users/music-files/ost/humrahi.mp3','Pakistani OST',NOW(),NOW()),
('Dayan','Shani Arshad','dayan.jpg','users/music-files/ost/dayan.mp3','Pakistani OST',NOW(),NOW()),
('Mannat Murad','Asim Azhar','mannat murad.jpg','users/music-files/ost/mannat-murad.mp3','Pakistani OST',NOW(),NOW()),
('Mohra','Yashal Shahid','mohra.jpg','users/music-files/ost/mohra.mp3','Pakistani OST',NOW(),NOW()),
('Naqaab','Yashal Shahid','naqaab.jpg','users/music-files/ost/naqaab.mp3','Pakistani OST',NOW(),NOW()),
('Parizaad','Syed Asrar Shah','parizaad.jpg','users/music-files/ost/parizaad.mp3','Pakistani OST',NOW(),NOW()),
('Sirf Tum','Shani Arshad','sirf tum.jpg','users/music-files/ost/sirf-tum.mp3','Pakistani OST',NOW(),NOW()),
('Anaa','Sahir Ali Bagga and Hania Amir','aana.jpg','users/music-files/ost/anaa.mp3','Pakistani OST',NOW(),NOW()),
('Humraazi','Wajhi Farooki','humrazi.jpg','users/music-files/ost/humraazi.mp3','Pakistani OST',NOW(),NOW()),
('Tere Bin','Shani Arshad','tere bin.jpg','users/music-files/ost/tere-bin.mp3','Pakistani OST',NOW(),NOW());

-- Remove OST songs that have no cover image / use the SOUND logo (manual alternative to `php artisan migrate`).
DELETE FROM songs WHERE (category LIKE '%OST%' OR category LIKE '%Pakistani%' OR name LIKE '%OST%')
  AND (image IS NULL OR image = '' OR LOWER(image) IN ('weblogo.png','logo.png','play-default.png','play.png','pause.png'));
