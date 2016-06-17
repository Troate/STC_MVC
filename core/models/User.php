<?php
/**
 * Contains User Class
 */

/**
 * Includes
 */
require_once $_SESSION['Root'].'\core\models\modelInterface.php';
 
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
