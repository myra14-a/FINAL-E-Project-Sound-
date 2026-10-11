# SOUND Website — Windows Setup

## Requirements
- PHP 8.3 or newer (PHP 8.4 is fine)
- Composer
- MySQL / MariaDB (XAMPP or Laragon is fine)
- Node.js and npm

## Run locally
1. Extract this ZIP into a folder, for example `C:\xampp\htdocs\SOUND`.
2. Start **Apache** and **MySQL** in XAMPP (Apache is optional if you use Laravel's development server).
3. Open phpMyAdmin at `http://localhost/phpmyadmin` and create a database named **sound** with `utf8mb4_unicode_ci` collation.
4. Open Command Prompt / PowerShell in the project folder. If `.env` does not exist, run `copy .env.example .env` (the included `SETUP-WINDOWS.bat` does this automatically).
5. Check the database settings in `.env`: `DB_DATABASE=sound`, `DB_USERNAME=root`, and your MySQL password.
6. Run `SETUP-WINDOWS.bat` by double-clicking it, or run these commands one by one:

```bat
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

If `.env` already exists, do **not** overwrite it with `copy`; just check its database values.

7. Open `http://127.0.0.1:8000`. The SOUND welcome dashboard appears first, with only **Sign Up** and **Log In** buttons.

## Login flow
- New user: choose **Sign Up**; after registration, SOUND opens the main `/index` page.
- Existing user: **Log In**; a normal user opens `/index`.
- Admin: log in with an admin account; the admin panel opens at `/admin`.

## Default local admin
- User ID: `admin`
- Email: `admin@example.com`
- Password: `ChangeMe123!`

These are development credentials only. Change `ADMIN_PASSWORD` in `.env` before running the seeder on a new database, and never use the default password on a public website.

## Notes
- The supplied `.env.example` uses MySQL. Create the `sound` database before running migrations.
- If you change `.env`, run `php artisan config:clear`.
- If a port is busy, run `php artisan serve --port=8001` and open `http://127.0.0.1:8001`.
