# Music & Video Website — Project Documentation

## 1. Project Overview
A Laravel 13 music/video website using the existing SOUND theme. The application provides a public User area and an Administrator area.

> Note: the specification says three users/roles but lists only two: **Administrator** and **USER**. This implementation therefore uses these two roles.

## 2. Administrator Features
- Add, edit and delete Music files with title, artist, album, year, description, audio and thumbnail.
- Add, edit and delete Video files with title, artist, album, year, description, video and thumbnail.
- Create, edit and delete categories such as YEAR, ARTIST, ALBUM and GENRE.
- Create/manage users and login accounts.
- Promote/demote Administrator access.
- Manage website name, tagline, hero content, contact details, footer and social links.
- Dashboard showing counts and recent media.

## 3. USER Features
- Register with mandatory Name, unique User ID, Address, Phone Number and Email.
- Login using Email or unique User ID.
- Search Music/Video by name, artist, year and album.
- View/play published music and videos.
- Add or modify one review per media item.
- Add or modify one rating (1–5) per media item.

## 4. New Content Indicator
Items added within the latest 7 days show a flashing **NEW** badge on the public Index/Media listing.

## 5. Validation
Registration and user-management fields use server-side Laravel validation. Email and User ID are unique. Phone, password, file type/size, image type/size, URLs, category and rating values are validated.

## 6. Main URLs
- `/` or `/index` — Index/Home
- `/media` — Music/Video search
- `/register` — User registration
- `/login` — Login
- `/admin` — Administrator dashboard

## 7. Admin Login
Default values are controlled by `.env`:
- `ADMIN_USERNAME=admin`
- `ADMIN_EMAIL=admin@example.com`
- `ADMIN_PASSWORD=ChangeMe123!`

Change these before deployment.

## 8. Installation
```bash
composer install
copy .env.example .env
php artisan key:generate
npm install
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan storage:link
npm run build
php artisan serve
```
Configure MySQL in `.env` if using XAMPP. The supplied project is configured for MySQL by default.

## 9. Database Backup
`database/backup.sql` contains the database structure and initial administrator/category records. For a live project, take a fresh export from phpMyAdmin before submission/deployment.

## 10. Git
The existing Git repository and theme assets are preserved. Do not commit `.env`, uploaded media or `node_modules`.
