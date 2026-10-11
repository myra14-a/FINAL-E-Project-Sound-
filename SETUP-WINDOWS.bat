@echo off
setlocal
cd /d %~dp0
echo === SOUND Website Setup ===
if not exist .env (
  copy .env.example .env
  echo Created .env from .env.example. Check database settings before continuing.
)
if not exist vendor\autoload.php (
  echo Installing Composer dependencies...
  composer install
  if errorlevel 1 goto failed
)
php artisan key:generate
if errorlevel 1 goto failed
if not exist storage\framework\views mkdir storage\framework\views
if not exist storage\framework\cache mkdir storage\framework\cache
if not exist storage\framework\sessions mkdir storage\framework\sessions
if not exist storage\logs mkdir storage\logs
echo Make sure the MySQL database named sound already exists.
php artisan migrate --seed
if errorlevel 1 goto failed
php artisan storage:link
if not exist node_modules npm install
if errorlevel 1 goto failed
npm run build
if errorlevel 1 goto failed
echo.
echo Setup complete. Run: php artisan serve
echo Then open http://127.0.0.1:8000
pause
exit /b 0
:failed
echo.
echo Setup failed. Check the error above and review SOUND-SETUP.md.
pause
exit /b 1
