<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       session_start();
require_once './autoload.php';
require_once './config.php';

use fotobank\controller\UserController;
use fotobank\dao\MysqlConnection;
use fotobank\dao\MysqlUserDAO;
use fotobank\service\UserServiceImpl;
use fotobank\layout\Layout;
use fotobank\controller\ImageController;
use fotobank\dao\MysqlImageDAO;
use fotobank\service\ImageServiceImpl;

MysqlConnection::$dbh = new PDO('mysql:host=' . Config::$dbhost . ';dbname=' .Config::$dbname, 
        Config::$dbuser, 
        Config::$dbpass);  
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($action)) {
    $action='index';
}
$ctrl = new UserController();
$ctrl->setUserService(new UserServiceImpl(new MysqlUserDAO()));
if (isset($_SESSION['id'])) {
    $ctrl->setUserId($_SESSION['id']);
}
/*
$ctrl = new ImageController();
$ctrl->setImageService(new ImageServiceImpl(new MysqlImageDAO()));
if (isset($_SESSION['id'])) {
    $ctrl->setImageId($_SESSION['id']);
}
  */  
$layout = new Layout();
switch ($action) {
    case "showUser":
        $ctrl->setRequestParam('id', empty(filter_input(INPUT_GET, 'id')) ? $_SESSION['id'] : filter_input(INPUT_GET, 'id'));
        $viewName = $ctrl->showUser();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "createUser" :
        $ctrl->setRequestParam('name', filter_input(INPUT_POST, 'name'));
        $ctrl->setRequestParam('pass', filter_input(INPUT_POST, 'pass'));
        $ctrl->setRequestParam('re_pass', filter_input(INPUT_POST, 're_pass'));
        $ctrl->createUser();
        break;
    case "login" :
        $ctrl->setRequestParam('name', filter_input(INPUT_POST, 'name'));
        $ctrl->setRequestParam('pass', filter_input(INPUT_POST, 'pass'));
        $viewName = $ctrl->login();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "newUser" :
        require_once 'view/editUser.php';
        break;
    
    case "uploadImage":
        require_once 'view/uploadImage';
        break;
        
    case "index" :
        $viewName = $ctrl->index();
        
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "google" :
        echo '<h1>hello </h1>';
        flush();
        header('location: http://www.google.com/');
        break;
    default :
        http_response_code(404);
        echo "Page does not exist";
}











        ?>
        
    </body>
</html>
