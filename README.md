#  World of Food App (e-Commerce)

It is a tool that allows the user to fetch current exchange rates based on the selected source.
In the project, in addition to the Central Bank of the Republic of Turkey (TCMB), a second source is also used.
The user needs to register through the Central Bank of the Republic of Turkey's EVDS system and obtain an API key, which should be defined in the `.env` file as `API_KEY_TCMB="xxxxxxxxxx"`.
A similar method should be applied to fetch current rates from a source other than TCMB.

## Topics

- PHP
- Laravel
- MySQL

## Libraries & Plugins
- Laravel

***
### Author

* [Ümit GENİŞ](https://github.com/umitgenis/)

***
### `composer install`
### `.env => DB configuration` 
### `.env => API_KEY_TCMB="xxxxxxxxxx" or API_KEY_COLLECT="xxxxxxxxxx"` 
### `php artisan migrate`
### `php artisan serve`

Runs the app in the development mode.
Open http://localhost:8000 to view it in the browser.

The page will reload if you make edits.
