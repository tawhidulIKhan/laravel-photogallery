## Laravel Photo Gallery

[Live Demo](https://salty-plateau-43077.herokuapp.com/)

**Laravel Photo Gallery** is a photo uploading application.
Colorlib Template Photon used as Frontend HTML Template

### Installation

-   `git clone https://github.com/tawhid-coder/laravel-photogallery.git photogallery`
-   `cd photogallery`
-   `cp .env.example .env`
-   `composer install`
-   `php artisan key:generate`
-   Create a database and inform _.env_
-   Set APP_URL , APP_NAME to \*.env\_
-   `php artisan migrate --seed` to create and populate tables
-   Inform _config/mail.php_ for email sends
-   `php artisan serve` to start the app on http://localhost:8000/

### Features

-   Home page
-   About Page
-   Service Page
-   Contact Page
-   Authentication (registration, login, logout, password reset, mail confirmation)
-   Users roles : roles,permission (Laratrust Package)
-   Album Create Option
-   Photo Upload Option
-   Admin dashboard

### Packages included

-   laratrust

### Tricks

To test application the database is seeding with users :

-   Administrator : email = superadministrator@app.com, password = password
-   Redactor : email = administrator@app.com, password = password
-   Contributor : email = contributor@app.com, password = password
