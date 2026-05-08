# Winter Olympics 2026

Laravel project for the Programmation Web course.

A ticket booking site for the 2026 Winter Olympics in Milano-Cortina. People can browse competitions, buy tickets, and organizers have a separate panel to manage everything.

## Setup

You need PHP 8.2+ and Composer.

git clone https://github.com/jiri133/les-Jeux-Olympiques-d-hiver-appli.git
cd les-Jeux-Olympiques-d-hiver-appli
composer install
cp .env.example .env
php artisan key:generate

Make sure .env has DB_CONNECTION=sqlite. Create the empty database file at database/database.sqlite (on Linux/Mac: touch database/database.sqlite).

Then:

php artisan migrate:fresh --seed
php artisan serve

Open http://127.0.0.1:8000

## Organizer login

organizer@jo.fr
password

## Made by

Irina-Adelina Jiroveanu 