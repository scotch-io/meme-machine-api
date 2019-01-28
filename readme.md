# Meme Machine API

The API used in the Vue for the Real World Book.

## Developing

We won't be using Vagrant for this app thank god. We'll be using PHP's local server to serve the app and SQLite (file) as our database.

-   Create a database file: `database/database.sqlite`
-   Install Composer Packages: `composer install`
-   Install JS Packages: `npm install`
-   Copy `.env.example` to `.env`
-   Create a JWT_SECRET: `php artisan jwt:secret`
-   Run the App: `php artisan serve`
-   View App: <http://localhost:8000>

## Using for Frontend Users

Users will create an account here.

They will then be sent to the dashboard which is just API docs.

They will authenticate and get a token through Vue.
