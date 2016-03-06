# Implementation of array flatten logic and geo search among customers from json file.

## Installation

```bash
composer install
```

## Basic Usage
In examples directory there are three files:
- [arrays.php - to test array flattening](examples/arrays.php)
- [customers.json - users json database to use them for geosearch](examples/customers.json)
- [geo.php - script to get users from database and output only those fit in specified radius i.e. run it geo.php --radius=100 to get all users from inside the 100 km zone from Intercom office in Dublin](examples/geo.php)

## Tests:
```bash
./vendor/bin/phpunit
```