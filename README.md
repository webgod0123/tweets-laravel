<h1 align="center">
  <a href="https://laravel.com/"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a>
</h1>

## Installation

```bash
# Clone this repository
$ git clone https://github.com/webgod0123/tweets-laravel

# Go into the repository
$ cd tweets-laravel

# Install dependencies
$ composer install

# Copy .env.example to .env or rename it to .env
$ cp .env.example .env

# Generate application key
$ php artisan key:generate

```

## How To Use

To use/run this project you need to configure your mysql database and add database details to the .env file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<your database name>
DB_USERNAME=<your database username>
DB_PASSWORD=<your database password>
```
Once this is complete you can start the app by-
```bash
# Run the migration
$ php artisan migrate

# Install npm dependencies
$ npm install
$ npm run dev

# Run the app
$ php artisan serve
```

The application should start on [localhost:8000](http://127.0.0.1:8000/)

To upload image, configure storage link in `filesystem.php` and run-
```bash
$ php artisan storage:link
```

