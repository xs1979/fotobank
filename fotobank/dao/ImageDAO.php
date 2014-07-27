<?php

namespace fotobank\dao;

use fotobank\model\Image;


interface ImageDAO extends DAO {
    function find($id);
    function save(Image $image);
    function findByName($name);
}