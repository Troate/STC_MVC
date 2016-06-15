<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Student{
    private $id;
    private $name;
    private $age;
    private $degree;
//    function __construct($name, $age, $contact, $degree) {
//        $this->name = $name;
//        $this->age = $age;
//        $this->contact = $contact;
//        $this->degree = $degree;
//    }
    function getName() {
        return $this->name;
    }

    function getAge() {
        return $this->age;
    }

    function getId() {
        return $this->id;
    }

    function getDegree() {
        return $this->degree;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAge($age) {
        $this->age = (int)$age;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDegree($degree) {
        $this->degree = $degree;
    }


}

?>