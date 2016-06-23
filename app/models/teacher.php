<?php
/**
 * Contains the Model Teacher
 */

/**
 * Teacher has Name, Age and Course
 */
class Teacher extends User {
    /**
     * @var int $id Id as in Database
     */
    private $id;
    /**
     * @var int $age Age of the Teacher
     */
    private $age;
    /**
     *
     * @var string $course Course of the Teacher
     */
    private $course;
    /**
     * Getter of $name
     * @return string Name of the Teacher
     */
    function getName() {
        return parent::getName();
    }
    /**
     * Getter of the $age
     * @return int Age of the Teacher
     */
    function getAge() {
        return $this->age;
    }
    /**
     * Getter of $id
     * @return int Id as in Database
     */
    function getId() {
        return $this->id;
    }
    /**
     * Getter of $course
     * @return string Course of the Teacher
     */
    function getCourse() {
        return $this->course;
    }
    /**
     * Setter of $name
     * @param string $name Name of the Teacher
     */
    function setName($name) {
        parent::setName($name);
    }
    /**
     * Setter of $age
     * @param int $age Age of the Teacher
     */
    function setAge($age) {
        $this->age = (int)$age;
    }
    /**
     * Setter of $id
     * @param int $id Id of the Teacher
     */
    function setId($id) {
        $this->id = $id;
    }
    /**
     * Setter of $course
     * @param string $course Course of the Teacher
     */
    function setCourse($course) {
        $this->course = $course;
    }


}
