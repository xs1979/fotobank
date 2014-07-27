<?php
namespace fotobank\controller;


use fotobank\model\User;
use fotobank\service\UserService;
use stdClass;


class UserController extends AbstractController {
    private $userService;
    
    private $view;
    
    
    private $userId = null;

            
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

        
    public function getView() {
        return $this->view;
    }

    public function setView($view) {
        $this->view = $view;
    }

        function __construct() {
            parent::__construct();
        $this->view = new stdClass();
    }

    
    function setUserService(UserService $service) {
        $this->userService = $service;
    }
    

        
    function showUser() {
        $id = $this->getRequestParam('id');
        $this->view->user = $this->userService->find($id);
        //require_once 'view/showUser.php';
        return 'showUser';
    }
    
    function createUser() {
        $view = new stdClass();
        $name = $this->getRequestParam('name');
        $pass = $this->getRequestParam('pass');
        $repass = $this->getRequestParam('re_pass');
        if ($pass !== $repass) {
            $view->error = "Passwords do not match";
            require_once 'view/editUser.php';
            return;
        }
        
        $user = new User();
        $user->setName($name);
        $user->setPass($pass);
        $view->user = $this->userService->save($user);
        require_once 'view/showUser.php';
    }
    
    function login() {
        $view = new stdClass();
        $name = $this->getRequestParam('name');
        $pass = $this->getRequestParam('pass');
        if (empty($name) && empty($pass)) {
            return 'login';
        }
        else if (FALSE !== ($this->view->user = $this->userService->authorize($name, $pass))) {
            //setcookie('id', $view->user->getId(), time()+60);
            $_SESSION['id'] = $this->view->user->getId();
            return 'showUser';
        } else {
            $view->error = "Login failed! You're a hacker!";
            return 'login';
        }
    }
    
   
    
    function index() {
        return 'index';
    }
}
