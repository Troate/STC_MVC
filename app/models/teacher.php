<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teacher
 *
 * @author Troate
 */
class Teacher {
    //put your code here
    private $name;
    private $age;
    private $contact;
    private $course;
    function __construct($name, $age, $contact, $course) {
        $this->name = $name;
        $this->age = $age;
        $this->contact = $contact;
        $this->course = $course;
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

    function getCourse() {
        return $this->course;
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

    function setCourse($course) {
        $this->course = $course;
    }


}
