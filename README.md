<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## To run Laravel Auth System Locally

`composer install`

## copy content of .env.example to .env
`cp .env.example .env`

## Fill in your database configuration
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
## Then start the development 

`php artisan serve`


## Finally head over to 

http://localhost:8000/login 

### To seed the system with admin use

`php artisan tinker`

### Then enter these commands to the tinker prompt

```
use App\Model\Admin
Admin::create(['name' => "Admin", 'email' => "admin@gmail.com", 'password' => Hash::make('Admin')])
```
### You can then head over to admin login url
http://localhost:8000/admin/login

