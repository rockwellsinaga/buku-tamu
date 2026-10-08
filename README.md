# Buku Tamu

A digital guest book for **Dinas Arsip dan Perpustakaan Kota Semarang (Arpusda)**. It records member, nonmember, and group visits across Perpustakaan Keliling, Pameran, and Metaverse activities.

This project was developed during a project-based internship at **Dinas Komunikasi, Informatika, Statistik dan Persandian Kota Semarang (Diskominfo Kota Semarang)** for Arpusda. This repository is a reconstructed and refactored portfolio version; it contains no production visitor data.

## Features

- Three visit types: library member, nonmember, and group.
- Event-specific forms without trusting editable event IDs from the browser.
- Server-side validation and clear Indonesian feedback.
- Filament admin dashboard for managing and reviewing visits.
- Monthly visit charts and summary cards.
- Reproducible database schema and reference seed data.
- SQLite setup for local development and MySQL support for deployment.
- Automated feature tests for the main submission flows.

## Tech stack

- PHP 8.2+
- Laravel 12
- Filament 3
- Bootstrap 5
- SQLite or MySQL
- PHPUnit

## Local setup

Requirements: PHP 8.2 or newer with SQLite enabled, and Composer 2.

```bash
git clone https://github.com/rockwellsinaga/buku-tamu.git
cd buku-tamu
composer install
composer run setup
php artisan serve
```

Open `http://localhost:8000` for the guest book and `http://localhost:8000/admin` for the staff dashboard.

### Create an admin account

Use Filament's interactive command:

```bash
php artisan make:filament-user
```

Alternatively, set `ADMIN_NAME`, `ADMIN_EMAIL`, and `ADMIN_PASSWORD` in `.env`, then run `php artisan db:seed`. Do not commit the `.env` file or real credentials.

## MySQL configuration

SQLite is the default so the project can run without an external database server. For MySQL, update `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=buku_tamu_arpusda
DB_USERNAME=root
DB_PASSWORD=
```

Then run `php artisan migrate --seed`.

## Tests

```bash
composer test
```

The feature suite verifies the landing page, all three visit submission flows, validation failures, and database persistence.

## Database reconstruction

The original production database was not available. The migrations in this repository were reconstructed from the original models, controllers, forms, and Filament resources. Reference values for events, gender, occupation, and education are supplied by `DatabaseSeeder`.

## Privacy and repository hygiene

- No real guest records or database dump are included.
- Runtime files, credentials, local SQLite databases, and dependencies are ignored by Git.
- Large unused template assets and the original institutional profile video are excluded from the portfolio repository.

## License

The source code is available under the MIT License. Institutional names, emblems, photographs, and other visual assets remain the property of their respective owners.
