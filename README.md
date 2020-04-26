# Pizza Delivery backend


## Installation

1. Clone the repository to your server

2. Rename ```config-sample.php``` to ```config.php``` and define db entries. Example:

```php
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');
define('DB_NAME','pizza_delivery');
```

3. Import ```pizza_delivery.sql``` to your database

4. Create manually ```/frontend/``` folder in your document root near ```/api/``` existing folder and place your frontend in it or build your frontend [automatically](https://github.com/jfxteam/ca-pizza-delivery/blob/master/README.md)

5. Run your server!
