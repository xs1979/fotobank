<?php


namespace fotobank\service;


class UserServiceImpl implements UserService {

   
    private $dao;
    private $userDAO;
    
    function __construct(\fotobank\dao\UserDAO $dao) {
        $this->userDAO = $dao;
    }

    public function find($id) {
        return $this->userDAO->find($id);
    }

    public function save(\fotobank\model\User $user) {
        return $this->userDAO->save($user);
    }

    public function authorize($name, $pass) {
        return $this->userDAO->findByNameAndPass($name, $pass);
    }

}
