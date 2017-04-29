## SM-Website

SM-Website is the site of the SuperMan ROM Android. The site uses the [Laravel](https://laravel.com/) framework.
If you think some patterns are not respecte, please create an issue.

## How to install

Before install, you must have :

- [Composer](https://getcomposer.org/)
- [PHP Extension that Laravel need](https://laravel.com/docs/5.4#installation)

Here's the procedure to follow :

```bash
composer install
php artisan key:generate
php -r "file_exists('.env') || copy('.env.example', '.env');" # Edit your .env
php artisan migrate
php artisan serve # http://localhost:8000
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
