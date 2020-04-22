<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use \Hcode\Page;
use \Hcode\Model\User;


$app->get('/', function (Request $request, Response $response, $args) {

    $page = new Page();
    $page->setTpl("index");
    return $response;
});

$app->get('/login', function (Request $request, Response $response, $args) {

    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl("login-page", [
        "error"=>User::getError()
    ]);
    return $response;
});

$app->post('/login', function (Request $request, Response $response, $args) {

    try {

        User::login($_POST["login"], $_POST["password"]);

    } catch (Exception $e) {
        User::setError($e->getMessage());
        header("Location: /login");
        exit;
        
    }

    header("Location: /dashboard");
    exit;

});

?>