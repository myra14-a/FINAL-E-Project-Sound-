-- MUSIC & VIDEO WEBSITE - DATABASE BACKUP
-- MySQL 8.x / utf8mb4
CREATE DATABASE IF NOT EXISTS sound CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sound;
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS ratings, reviews, category_media_item, categories, media_items, site_settings, users;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE users (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL,
 username VARCHAR(50) UNIQUE NULL,
 address VARCHAR(255) NULL,
 phone VARCHAR(30) NULL,
 email VARCHAR(255) NOT NULL UNIQUE,
 email_verified_at TIMESTAMP NULL,
 password VARCHAR(255) NOT NULL,
 is_admin TINYINT(1) NOT NULL DEFAULT 0,
 remember_token VARCHAR(100) NULL,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE media_items (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 type ENUM('music','video') NOT NULL,
 title VARCHAR(255) NOT NULL,
 artist VARCHAR(255) NULL,
 album VARCHAR(255) NULL,
 year SMALLINT UNSIGNED NULL,
 description TEXT NULL,
 file_path VARCHAR(255) NOT NULL,
 thumbnail_path VARCHAR(255) NULL,
 is_published TINYINT(1) NOT NULL DEFAULT 1,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL,
 INDEX(type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE categories (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 type VARCHAR(50) NOT NULL,
 name VARCHAR(100) NOT NULL,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL,
 UNIQUE KEY categories_type_name_unique(type,name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE category_media_item (
 category_id BIGINT UNSIGNED NOT NULL,
 media_item_id BIGINT UNSIGNED NOT NULL,
 PRIMARY KEY(category_id,media_item_id),
 CONSTRAINT fk_cmi_category FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE,
 CONSTRAINT fk_cmi_media FOREIGN KEY(media_item_id) REFERENCES media_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE site_settings (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 site_name VARCHAR(100) NOT NULL,
 tagline VARCHAR(255) NULL,
 hero_title VARCHAR(255) NOT NULL,
 hero_subtitle VARCHAR(255) NULL,
 hero_description VARCHAR(1000) NULL,
 phone VARCHAR(50) NULL,
 email VARCHAR(255) NULL,
 footer_text VARCHAR(500) NULL,
 facebook_url VARCHAR(500) NULL,
 instagram_url VARCHAR(500) NULL,
 twitter_url VARCHAR(500) NULL,
 youtube_url VARCHAR(500) NULL,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reviews (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT UNSIGNED NOT NULL,
 media_item_id BIGINT UNSIGNED NOT NULL,
 review TEXT NOT NULL,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL,
 UNIQUE KEY reviews_user_media_unique(user_id,media_item_id),
 CONSTRAINT fk_reviews_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
 CONSTRAINT fk_reviews_media FOREIGN KEY(media_item_id) REFERENCES media_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE ratings (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT UNSIGNED NOT NULL,
 media_item_id BIGINT UNSIGNED NOT NULL,
 rating TINYINT UNSIGNED NOT NULL,
 created_at TIMESTAMP NULL,
 updated_at TIMESTAMP NULL,
 UNIQUE KEY ratings_user_media_unique(user_id,media_item_id),
 CONSTRAINT fk_ratings_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
 CONSTRAINT fk_ratings_media FOREIGN KEY(media_item_id) REFERENCES media_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (name,username,address,phone,email,email_verified_at,password,is_admin,created_at,updated_at)
VALUES ('Administrator','admin','Website Administration','0000000000','admin@example.com',NOW(),'$2y$12$Dot9uBjEQWp9ogtkL3GDCuyUtzvdR7xJxu0Snr1wB3eLqWMpGaB3a',1,NOW(),NOW());

INSERT INTO categories(type,name,created_at,updated_at) VALUES
('YEAR','2026',NOW(),NOW()),('YEAR','2025',NOW(),NOW()),('ARTIST','Atif Aslam',NOW(),NOW()),
('ARTIST','Arijit Singh',NOW(),NOW()),('ALBUM','Singles',NOW(),NOW()),('GENRE','OST',NOW(),NOW()),('GENRE','Pop',NOW(),NOW());

INSERT INTO site_settings(id,site_name,tagline,hero_title,hero_subtitle,hero_description,footer_text,created_at,updated_at)
VALUES(1,'SOUND','Music for every mood','Feel the heart beats','New single','Discover the latest music, artists, albums and videos.','Your music, your vibe.',NOW(),NOW());
