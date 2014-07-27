<?php

namespace fotobank\service;


class ImageServiceImpl implements ImageService {

   
    private $dao;
    private $imageDAO;
    
    function __construct(\fotobank\dao\ImageDAO $dao) {
        $this->imageDAO = $dao;
    }

    public function find($id) {
        return $this->imageDAO->find($id);
    }

    public function save(\fotobank\model\Image $image) {
        return $this->imageDAO->save($image);
    }

    public function findByName($name) {
        return $this->imageDAO->findByName($name);
    }

}