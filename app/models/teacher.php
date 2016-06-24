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
        $name[3]='Course';
        $this->setCols($name);
    }
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
