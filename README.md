
# Winter Olympics 2026 — Web Project

Laravel app for selling tickets to the Milano-Cortina 2026 Winter Olympics.

Made for the Programmation Web course, 2026.

## What it does

- Browse the calendar of competitions
- Buy tickets for one or more events
- Organizers can log in and manage everything (add competitions, see reservations, stats)

## Tech

Laravel 13, PHP 8.2+, SQLite, Bootstrap 5 (via CDN), Laravel Breeze for auth.

## How to run it

You need PHP 8.2+ and Composer installed.

git clone https://github.com/jiri133/les-Jeux-Olympiques-d-hiver-appli.git
cd les-Jeux-Olympiques-d-hiver-appli
composer install

Copy `.env.example` to `.env` and run:

php artisan key:generate

In `.env`, make sure you have `DB_CONNECTION=sqlite`. Comment out the other DB lines.

Create an empty file at `database/database.sqlite`. On Linux/Mac:

touch database/database.sqlite

Then:

php artisan migrate:fresh --seed
php artisan serve

Open http://127.0.0.1:8000.

## Login for organizer

Email: organizer@jo.fr
Password: password

Public registration is disabled — only organizers exist, created via seeder.

## Database

Six tables: users, sports, venues, rounds, reservations, spectators.

The cart is stored in the session, not in the DB. Only confirmed reservations are saved.

Each spectator has the same phone and email as the buyer (project requirement).

## If something breaks

Run `php artisan migrate:fresh --seed` to reset the database.

If you get class not found errors, try `composer dump-autoload`.

## Team

Irina-Adelina Jiroveanu and [coleg's name]