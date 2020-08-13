<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use \Hcode\PageAdmin;
use \Hcode\Model\User;





$app->get('/dashboard', function (Request $request, Response $response, $args) {

	User::verifyLogin();

	$data = insertVisits();


	$users = User::listAll();

	$page = new PageAdmin();
	
	$page->setTpl("dashboard", [
		"months_qntd"=>$data,
		"users_qntd"=>count($users)
	]);

	return $response;

});


$app->get('/indices', function (Request $request, Response $response, $args) {

	User::verifyLogin();


	$users = User::listAll();

	$page = new PageAdmin();
	
	$page->setTpl("indices");

	return $response;

});

$app->get('/files', function (Request $request, Response $response, $args) {

	User::verifyLogin();

	// $page = new PageAdmin();
	
	// $page->setTpl("dashboard", [
	// 	"months_qntd"=>$data
	// ]);

	return $response;

});

$app->get('/logout', function (Request $request, Response $response, $args) {

	

	User::logout();
	header("Location: /login");
	exit;

});

$app->post('/new-post', function (Request $request, Response $response, $args) {

	User::verifyLogin();

	echo $_POST['system'];
	echo $_POST['subject'];
	echo $_POST['text'];
	
	return $response;

});


// $app->get('/admin/login', function() {
//     $page = new PageAdmin([
// 		"header"=>false,
// 		"footer"=>false
// 	]);
// 	$page->setTpl("login",[
//         "error"=>User::getError()
//     ]);
	
// });
// $app->post('/admin/login', function() {
	
// 	try {

//         User::login($_POST["login"], $_POST["password"]);

//    } catch (Exception $e) {
//        User::setError($e->getMessage());
//        header("Location: /admin/login");
//        exit;
//    }
//    header("Location: /admin");
//    exit;
	
// });





// // FORGOT:


// $app->get('/admin/forgot', function() {
	

// 	$page = new PageAdmin([
// 		"header"=>false,
// 		"footer"=>false
// 	]);
// 	$page->setTpl("forgot");
	
	
// });

// $app->post("/admin/forgot", function()
// {
	
// 	$user = User::getForgot($_POST["email"]);
// 	header("Location: /admin/forgot/sent");
// 	exit;
// });

// $app->get('/admin/forgot/sent', function() {
	

// 	$page = new PageAdmin([
// 		"header"=>false,
// 		"footer"=>false
// 	]);
// 	$page->setTpl("forgot-sent");
	
// });

// $app->get("/admin/forgot/reset", function(){

// 	$user = User::validForgotDecrypt($_GET["code"]);

// 	$page = new PageAdmin([
// 		"header"=>false,
// 		"footer"=>false
// 	]);
// 	$page->setTpl("forgot-reset", array(
// 		"name"=>$user["desperson"],
// 		"code"=>$_GET["code"]
// 	));
// });
// $app->post("/admin/forgot/reset", function()
// {
// 	$forgot = User::validForgotDecrypt($_POST["code"]);

// 	User::setForgotUser($forgot["idrecovery"]);

// 	$user = new User();

// 	$user->get((int)$forgot["iduser"]);

// 	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
//     'cost'=>12, //numero de processamento que o servidor fara para encryptar a senha. Quanto maior for, mais segura sera.
// 	]);

	
// 	$user->setPassword($password);

// 	$page = new PageAdmin([
// 		"header"=>false,
// 		"footer"=>false
// 	]);
// 	$page->setTpl("forgot-reset-success");




// });


?>