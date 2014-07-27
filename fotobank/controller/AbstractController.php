<?php

namespace fotobank\controller;


abstract class AbstractController {
     protected $request;
    
     function __construct() {
         $this->request = new \stdClass();
     }
     
    function setRequestParam($key, $value) {
        $this->request->$key = $value;
    }
    
    function getRequestParam($key) {
        return $this->request->$key;
    }
}
