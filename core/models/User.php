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
     * @var string $name Name of User
     */
    private $name;
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
