<?php

namespace fotobank\service;

use fotobank\model\Image;


interface ImageService {
    
    function find($id);
    function save(Image $image);
    function findByName($name);
    
}
