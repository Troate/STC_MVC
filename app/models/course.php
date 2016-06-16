<?php
/**
 * Contains the Model Course
 */

/**
 * Course has Name and CourseId
 */
class Course {
    /**
     * @var string $name Name of the Course 
     */
    private $name;
    /**
     * @var string $code CourseId of the Course
     */
    private $courseid;
    /**
     *
     * @var int $id This id is assigned value according the id of course in database 
     */
    private $id;
    /**
     * Getter of $id
     * @return int Id as in Database
     */
    function getId() {
        return $this->id;
    }
    /**
     * Setter of $id
     * @param int $id Id as in Database
     */
    function setId($id) {
        $this->id = $id;
    }
    /**
     * Getter of the Course
     * @return string Name of Course
     */
    function getName() {
        return $this->name;
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
        $this->name = $name;
    }
    /**
     * Setter of the Course Id
     * @param string $courseid Course id
     */
    function setCourseId($courseid) {
        $this->courseid = $courseid;
    }


}
