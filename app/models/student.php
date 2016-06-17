<?php
/**
 * Contains the Model Student
 */

/**
 * Includes
 */
require_once $_SESSION['Root'].'\core\models\User.php';

/**
 * Student has Name, Age and Degree
 */
class Student extends User{
    /**
     * @var int $id Id as in Database
     */
    private $id;
    /**
     * @var int $age Age of the Student
     */
    private $age;
    /**
     * @var string $degree Degree of the Student
     */
    private $degree;
    /**
     * Getter of $name
     * @return string Name of the Student
     */
    function getName() {
        return parent::getName();
    }
    /**
     * Getter of the $age
     * @return int Age of the Student
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
     * getter of $degree
     * @return string Degree of the Student
     */
    function getDegree() {
        return $this->degree;
    }
    /**
     * Setter of $name
     * @param string $name Name of the Student
     */
    function setName($name) {
        parent::setName($name);
    }
    /**
     * Setter of $age
     * @param int $age Age of the Student
     */
    function setAge($age) {
        $this->age = (int)$age;
    }
    /**
     * Setter of $id
     * @param int $id Id of the Student
     */
    function setId($id) {
        $this->id = $id;
    }
    /**
     * Setter of $degree
     * @param string $degree Degree of the Student
     */
    function setDegree($degree) {
        $this->degree = $degree;
    }


}

?>