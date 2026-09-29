# Tasks for Today Management System — TSA2

Developed by Robnic Mar Del Castillo using CodeIgniter 4 and MySQL.

## Features

- Public Welcome, Task List, Profile, and About pages
- Login and logout for the demo user
- Create and edit tasks with required-field validation
- Archive tasks instead of permanently deleting them
- Task management restricted to logged-in users

## Run locally with XAMPP

1. Put this project folder in `C:\xampp\htdocs`.
2. Start Apache and MySQL in XAMPP.
3. In phpMyAdmin, create a database named `tasks_for_today`.
4. Import `tasks_for_today_TSA2.sql` from this project folder.
5. Open a terminal in the project folder and run `composer install` if the `vendor` folder is missing.
6. Configure `.env` with your local database settings and the application's local base URL.
7. Open `http://localhost/tasks-for-today%20-%20TSA2/public/` in your browser.

## Demo login

- Username: `robnic`
- Password: `TaskDemo2026`

The password is stored as a hash in the database. The demo user can also be updated using `app/Database/Seeds/DemoUserSeeder.php`.