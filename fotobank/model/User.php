<?php
namespace fotobank\model;


class User {
    private $id;
    private $name;
    private $password;
    private $email;
    
    function getName() {
        return $this->name;
    }
    
    function setName($name) {
        $this->name = $name;
    }
    
    function getId() {
        return $this->id;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function getPass() {
        return $this->password;
    }
    
    function setPass($pass) {
        $this->password = $pass;
    }
}
