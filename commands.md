
```sh
composer install
```

```sh
php artisan key:generate
```

```sh
php artisan migrate
```


sudo chmod -R 775 database
sudo chown -R $(whoami) database

41

You need to run two commands

First, change ownership of the Laravel directory to web group:

sudo chown -R :www-data /var/www/yourLarvelFolder

Second, give privileges over storage directory so it can be writable:

sudo chmod -R 775 /var/www/yourLarvelFolder/storage
