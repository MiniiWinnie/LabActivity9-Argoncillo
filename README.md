# Bakuna Tracker ni Argoncillo

Lab Activity 9 - Laravel vaccination dashboard for Barangay Matina Crossing Health Center in Davao City.

## Seeded login

- Email: `nurse.argoncillo@bakuna.test`
- Password: `bakuna2026`

## Run locally

```powershell
composer install
npm install
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

Open `http://127.0.0.1:8000`. The `/dashboard` and `/schedule` pages require login.
