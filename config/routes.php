<?php
require_once '../config/database.php';
require_once '../app/controllers/UserController.php';

$request_uri = $_SERVER['REQUEST_URI'];
$route1 = parse_url($request_uri, PHP_URL_PATH);
$base_uri = '/mvc_ajax_crud';
$route = str_replace($base_uri, '', $route1);

$userController = new UserController();
switch ($route) {
case '/':
$userController->index();
break;

case '/display':
$userController->display();
break;

case '/insert':
$userController->insert();
break;
case '/inserted':
$userController->inserted();
break;

case '/edit':
$userController->edit();
break;
case '/fetch_display':
$userController->fetch_display();
break;
case '/edit_final':
$id=$_POST['id'];
$userController->edit_final($id);
break;

case '/delete':
$userController->delete();
break;
case '/delete_fetch':
$userController->delete_fetch();
break;
case '/deleted':
$userController->deleted($id);
break;

case '/signup':
$userController->signup();
break;
case '/signup_inserted':
$userController->signup_inserted();
break;

case '/check_email':
$email=$_POST['email'];
$userController->check_email($email);
break;

case '/check_mobile':
$mobile=$_POST['mobile'];
$userController->check_mobile($mobile);
break;

case '/about':
$userController->about();
break;

case '/contact':
$userController->contact();
break;

default:
// Handle 404 Not Found
http_response_code(404);
echo '404 Not Found';
break;
}
?>
