<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of course
 *
 * @author Troate
 */
class Course {
    //put your code here
    private $name;
    private $code;
//    function __construct($name, $code) {
//        $this->name = $name;
//        $this->code = $code;
//    }
    function getName() {
        return $this->name;
    }

    function getCode() {
        return $this->code;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCode($code) {
        $this->code = $code;
    }


}
