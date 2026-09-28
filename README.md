# Tasks for Today Management System

Developed by Robnic Mar Del Castillo using CodeIgniter 4 and MySQL.

## Pages

- `/` — tasks scheduled for today
- `/tasks` — all tasks, ordered by date
- `/profile` — demo user information
- `/about` — developer information

## Run locally

1. Install PHP, Composer, and XAMPP.
2. Start Apache and MySQL in XAMPP.
3. In phpMyAdmin, create a database named `tasks_for_today`.
4. Select that database, click Import, and import `tasks_for_today.sql` from this project folder.
5. Open a terminal in the project folder and run `composer install`.
6. Copy the `env` file to `.env`. Set the database name to `tasks_for_today` and enter your local MySQL username and password.
7. Run `php spark serve`.
8. Open `http://localhost:8080` in your browser.

The SQL export contains the `tasks` and `users` tables with eight sample tasks and one demo user.