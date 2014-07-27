<?php
namespace fotobank\dao;

use fotobank\model\User;


interface UserDAO extends DAO {
    //function find($id);
    function save(User $user);
    function findByNameAndPass($name, $pass);
}
