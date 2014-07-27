<?php

namespace fotobank\controller;


use fotobank\model\Image;
use fotobank\service\ImageService;
use stdClass;


class ImageController extends AbstractController {
    private $imageService;
    
    private $view;
    
    
    private $imageId = null;

            
    public function getImageId() {
        return $this->imageId;
    }

    public function setImageId($imageId) {
        $this->imageId = $imageId;
    }

        
    public function getView() {
        return $this->view;
    }
}