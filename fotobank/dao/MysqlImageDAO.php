<?php

namespace fotobank\dao;
use fotobank\dao\MysqlConnection;
use fotobank\dao\UserDAO;
use fotobank\dao\ImageDAO;
use fotobank\model\User;
use fotobank\model\Image;
class MysqlImageDAO implements ImageDAO {
    public function find($id) {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, name from image where id=:id");
        $stmt->bindParam('id', $id);
        $stmt->execute();
        while ($image = $stmt->fetchObject('\fotobank\model\Image')) {
            return $image;
        }
        return null;
    }

    public function findByName($name) {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, name from image where name=:name");
        $stmt->bindParam('name', $name);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        while ($name = $stmt->fetchObject('\fotobank\model\Image')) {
            return $name;
        }
        return null;
    }

    public function save(Image $image) {
        
    }

}

