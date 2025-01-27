<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Using Laravel 11 for the API

Laravel is a web application framework with expressive, elegant syntax.

### Installation
This project is using Laravel Sail, a built-in docker environment for Laravel. To install the project, you need to have Docker installed on your machine.

1. Clone the repository

```bash
git https://github.com/cashewcodes9/NumbatIOT.git
```

2. Change directory to the project folder

```bash 
cd NumbatIOT
```
3. start the docker environment

```bash
./vendor/bin/sail up 

Docker will start the environment and you can access API endpoints on http://0.0.0.0:80/api

for example: http://127.0.0.1:8000/api/devices to get devices.
```

if you want to run the project without docker, you can run the following commands:

```
composer install
```

Generate a new application key

``` 
php artisan key:generate
```

### Configurate database

Create a new database and update the .env file with the database credentials.

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

```
4. Run the migration to create the tables

```
php artisan migrate
```

5. Run the seeder to add dummy data to the database

```
php artisan db:seed
```
6. Create a password grant client


you can create your own password grant client by running the following command:

```
php artisan passport:client --password
````

### API Endpoints
Available endpoints are:
````
  POST      api/login ................................................................... login › AuthController@login
  POST      api/refresh ............................................................. refresh › AuthController@refresh
  POST      api/register .......................................................... register › AuthController@register
  GET|HEAD  api/user ................................................................ userIndex › AuthController@index
  GET|HEAD  api/user/devices ........................................... userDevices › DeviceController@getUserDevices
  GET|HEAD  api/device/{id} ....................................................... deviceShow › DeviceController@show
````

Additional endpoints for authorization server backed by Laravel Passport are:
````
GET|HEAD  oauth/authorize . passport.authorizations.authorize › Laravel\Passport › AuthorizationController@authorize
  POST      oauth/authorize passport.authorizations.approve › Laravel\Passport › ApproveAuthorizationController@appro…
  DELETE    oauth/authorize ....... passport.authorizations.deny › Laravel\Passport › DenyAuthorizationController@deny
  GET|HEAD  oauth/clients ....................... passport.clients.index › Laravel\Passport › ClientController@forUser
  POST      oauth/clients ......................... passport.clients.store › Laravel\Passport › ClientController@store
  PUT       oauth/clients/{client_id} ........... passport.clients.update › Laravel\Passport › ClientController@update
  DELETE    oauth/clients/{client_id} ......... passport.clients.destroy › Laravel\Passport › ClientController@destroy
  GET|HEAD  oauth/personal-access-tokens passport.personal.tokens.index › Laravel\Passport › PersonalAccessTokenContr…
  POST      oauth/personal-access-tokens passport.personal.tokens.store › Laravel\Passport › PersonalAccessTokenContr…
  DELETE    oauth/personal-access-tokens/{token_id} passport.personal.tokens.destroy › Laravel\Passport › PersonalAcc…
  GET|HEAD  oauth/scopes .............................. passport.scopes.index › Laravel\Passport › ScopeController@all
  POST      oauth/token ......................... passport.token › Laravel\Passport › AccessTokenController@issueToken
  POST      oauth/token/refresh ......... passport.token.refresh › Laravel\Passport › TransientTokenController@refresh
  GET|HEAD  oauth/tokens .......... passport.tokens.index › Laravel\Passport › AuthorizedAccessTokenController@forUser
  DELETE    oauth/tokens/{token_id} passport.tokens.destroy › Laravel\Passport › AuthorizedAccessTokenController@dest…

````

### Notes

I have added a few dummy data to the database to test the API. It will also create an oauth client for test environment.

````
php artisan db:seed
````

you can create your own password grant client by running the following command:

````
php artisan passport:client --password
````
