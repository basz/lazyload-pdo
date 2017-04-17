# Expressive Skeleton and Installer

Yes, from the skeleton

I added a route to a HomeAction that consumes a PDO connection.

When I define the PDO service as lazy loaded an error occures when it is being used.

that's it...



Once installed, configure a database connection in `config/autoload/pdo-connection.global.php`

Then run `composer run --timeout=0 serve` and go to [http://localhost:8080](http://localhost:8080). Al should be well.

No enable lazy loading, by uncommenting line 17 in `config/autoload/pdo-connection.global.php` and refresh. error..?


