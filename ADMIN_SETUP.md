# Admin & User Setup

## Administrator
Run:
```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```
Default admin:
- User ID: `admin`
- Email: `admin@example.com`
- Password: `ChangeMe123!`

Change these values in `.env` before real deployment.

Admin URL: `/admin`

## User
Registration URL: `/register`
Required fields:
- Name
- Unique User ID
- Address
- Phone Number
- Email
- Password

Users can search `/media`, open an item, and after login add/modify a review and rating.

## Media uploads
- Music: MP3/WAV/OGG/M4A
- Video: MP4/WEBM/MOV/AVI/MKV
- Thumbnail: JPG/JPEG/PNG/WEBP

Uploaded files are stored on Laravel's public disk.
