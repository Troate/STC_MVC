<?php
/**
 * Contains the Model Student
 */

/**
 * Student has Name, Age and Degree
 */
namespace app\models;
use core\models\User;
class Student extends User{
    
    /**
     * @var int $age Age of the Student
     */
    private $age;
    /**
     * @var string $degree Degree of the Student
     */
    private $degree;
    
    /**
     * Getter of Name of Columns
     * @return string_array
     */
    function getCols() {
        return parent::getCols();
    }
    /**
     * Setter of name columns in database
     * @param string_array $cols Array containing name of columns
     */
    function setCols($cols) {
        parent::setCols($cols);
    }
    /**
     * Constructor
     * Sets the Name of the Columns and call setCols function
     */
    function __construct() {
        $name[0]='Id';
        $name[1]='Name';
        $name[2]='Age';
        $name[3]='Degree';
        $this->setCols($name);
    }
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
        return (int)$this->age;
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
     * Setter of $degree
     * @param string $degree Degree of the Student
     */
    function setDegree($degree) {
        $this->degree = $degree;
    }


}

?>