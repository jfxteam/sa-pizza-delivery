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

3. Create ```/frontend/``` folder in your document root near ```/api/``` existing folder and place your [bundled frontend](https://github.com/jfxteam/ca-pizza-delivery/blob/master/README.md) in it

4. Import ```pizza_delivery.sql``` to your database

5. Run your server!
