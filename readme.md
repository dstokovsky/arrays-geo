Implementation of array flatten logic and geo search among customers from json file.

Before test anything please run:
composer install

In examples directory there are three files:
1) arrays.php - to test array flattening.
2) customers.json - users json database to use them for geosearch.
3) geo.php - script to get users from database and output only those fit in specified 
radius i.e. run it geo.php --radius=100 to get all users from inside the 100 km zone
from Intercom office in Dublin.

Tests:
./vendor/bin/phpunit