<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Student{
    private $name;
    private $age;
    private $contact;
    private $degree;
    function __construct($name, $age, $contact, $degree) {
        $this->name = $name;
        $this->age = $age;
        $this->contact = $contact;
        $this->degree = $degree;
    }
    function getName() {
        return $this->name;
    }

    function getAge() {
        return $this->age;
    }

    function getContact() {
        return $this->contact;
    }

    function getDegree() {
        return $this->degree;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setContact($contact) {
        $this->contact = $contact;
    }

    function setDegree($degree) {
        $this->degree = $degree;
    }


}

?>