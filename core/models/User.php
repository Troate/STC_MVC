<?php
/**
 * Contains User Class
 */
 
/**
 * Parent Class of Student, Teacher and Course
 */
class User implements modelInterface
{
    /**
     *
     * @var int $id This id is assigned value according the id of course in database 
     */
    private $id;
    /**
     * @var string $name Name of User
     */
    private $name;
    /**
     * @var string_array $cols Name of columns in database
     */
    private $cols;
    /**
     * Getter of Name of Columns
     * @return string_array
     */
    function getCols() {
        return $this->cols;
    }
    /**
     * Setter of name columns in database
     * @param string_array $cols Array containing name of columns
     */
    function setCols($cols) {
        $this->cols = $cols;
    }
    /**
     * Setter of $id
     * @param int $id Id as in Database
     */
    function setId($id) {
        $this->id = $id;
    }
    /**
     * Getter of $id
     * @return int Id as in Database
     */
    function getId() {
        return $this->id;
    }
    /**
     * Getter of $name
     * @return string Username
     */
    function getName()
    {
        return $this->name;
    }
    /**
     * Setter of $name
     * @param string $name Username
     */
    function setName($name) {
        $this->name=$name;
    }
}
