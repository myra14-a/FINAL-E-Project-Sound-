# SOUND — Fix & Run

The public Blog and Video pages now fail gracefully if their optional upload tables have not been migrated yet. Once the database is ready, they automatically fetch uploaded records.

## Windows commands

Run these inside the project folder:

```bat
php artisan optimize:clear
php artisan migrate
php artisan storage:link
php artisan serve
```

If your MySQL `sound` database already contains the application tables, **do not use `migrate:fresh`**, because that would delete existing data.

## What was fixed

- `/blogs` no longer throws a 500 when `bloguploads` has not been migrated.
- `/songvideo` no longer throws a 500 when `videouploads` has not been migrated.
- Search suggestions are connected to the existing published music/video records.
- Global success/error form notifications are displayed correctly from Laravel session flash messages.
- Contact submission keeps the requested message: `Message Sent Succesfully`.
- Blog Read More controls expand the remaining description without removing the existing blog cards.
- Pakistani OST cards and their existing image assets were preserved exactly.
- Existing content/features were not intentionally removed.
