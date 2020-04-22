<?php 

session_start();

require_once("vendor/autoload.php");

use Slim\Factory\AppFactory;




$app = AppFactory::create();

// Add Routing Middleware
$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);



// ######## functions

require_once("functions.php");


// ######## SITE

require_once("homePage.php");
// require_once("site.php");

// ####### ADMIN

require_once("admin.php");
// require_once("admin-users.php");
// require_once("admin-topics.php");
// require_once("admin-hqs.php");
// require_once("admin-recommendeds.php");

$app->run();


 ?>

