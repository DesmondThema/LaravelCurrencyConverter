
# About Currency Converter

Currency Converter is a basic online currency conversion powered by [Laravel](https://laravel.com/) at the back engine, [Laravel Blade](https://laravel.com/docs/9.x/blade) as the templating language and [TailwindCss](https://tailwindcss.com) for styling. 

## Local Installation
1. Clone this repo  
`git clone git@github.com:DesmondThema/LaravelCurrencyConverter.git`
2. cd into project  
`cd LaravelCurrencyConverter`
3. Install composer  
`composer install`
4. Install NPM Dependencies 
`npm install`
5. Copy the .env.example file and rename it into the .env file  
`cp .env.example .env` 
6. Generate application key  
`php artisan key:generate  
`
7. Create database. 
Create an empty database for your project using the database tools you prefer (My favorite is SequelPro for mac). In the .env file fill in your database credentials
8. Migrate the database  
`php artisan migrate` 
11. Build assets. 
12. `npm run dev`
13. Run the application  
`php artisan serve`  


# Features

## Login and Registration

Auth is powered by [Laravel Auth Starter Kit](https://laravel.com/docs/9.x/starter-kits) which provides a featherweight authentication for Single Page Applications (SPAs).


## Convert Currencies

Currency conveter allow users to convert between multiple currencies.

## Store user currency conversions. 

Currency conveter stores users currency conversion, to use this feauture a user must be registed and logged in. 
