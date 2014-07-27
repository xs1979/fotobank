<?php
namespace fotobank\service;

use fotobank\model\User;


interface UserService {
    function find($id);
    function save(User $user);
    function authorize($name, $pass);
}
