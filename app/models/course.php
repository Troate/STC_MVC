<?php
/**
 * Contains the Model Course
 */

/**
 * Course has Name and CourseId
 */
class Course extends User {
    
    /**
     * @var string $code CourseId of the Course
     */
    private $courseid;
    
    
    /**
     * Setter of the Course Id
     * @param string $courseid Course id
     */
    function setCourseId($courseid) {
        $this->courseid = $courseid;
    }
    /**
     * Getter of the Course
     * @return string Name of Course
     */
    function getName() {
        return parent::getName();
    }
    /**
     * Getter of the courseId
     * @return string CourseId
     */
    function getCourseId() {
        return $this->courseid;
    }
    /**
     * Setter of Course Name
     * @param string $name Course Name
     */
    function setName($name) {
        parent::setName($name);
    }
    
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
        $name[2]='CourseId';
        $this->setCols($name);
    }



}
