# Todo Sample

> Todo sample website with content.

This project runs with Laravel version 10.29.

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.1.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
 composer install
 npm install

# create .env file and generate the application key
cp .env.example .env
art key:generate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod
```

Then launch the server:

``` bash
php artisan serve
```
Use for user login:
``` bash
any email has role user
password: password
```
Use for admin login:
``` bash
email: admin@test.com
password: secret
```
The Todo sample project is now up and running! Access it at http://localhost:8000.

To pages:
```bash
http://localhost:8000/boards
http://localhost:8000/tickets
```

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command will seed the database seeder also
``` bash
art migrate:fresh --seed
```
## Used Folders 

- `app` - Contains all the Eloquent models, services, and notifications
- `app/Http/Controllers/` - Contains all the  controllers
- `app/Http/Services/` - Contains all the  services
- `app/Http/Middleware` - Contains the JWT auth middleware
- `app/Http/Requests` - Contains all the form requests
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes/web` - Contains all the routes 
- `resources/js` - Contains all the  components

## specifications 

- [Laravel](https://laravel.com) latest
- [Node.js](https://nodejs.org) latest
- [Inertia.js](https://inertiajs.com/) latest