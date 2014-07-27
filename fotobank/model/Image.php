<?php

namespace fotobank\model;
/**
 * Description of Image
 *
 * @author roman
 */
class Image {
    
    private $id;
    private $image;
    private $name;
            
    function save(Image $image) {
        
    }
    
    function getImage() {
        return $this->image;
    }
    
    function setImage($image) {
        $this->image = $image;
    }
    
    function getId() {
        return $this->id;
    }
    
    function setId($id) {
        $this->id = $id;
    }
     function getName() {
        return $this->name;
    }
    
    function setName($name) {
        $this->name = $name;
    }
}
