<?php
/**
 * Request Class
 */

/**
 * Namespaces
 */
namespace core\utils;


/**
 * Request Class
 */
class req
{
    /**
     * @var string $entity entity is like Student, Teacher and Course etc
     */
    private $entity;
    /**
     * @var string $action Action to be performed like Create, Read, Update and Delete
     */
    private $action;
    /**
     * @var array $parameter Values of different attributes, which can vary in count according to attribute
     */
    private $parameter;
    /**
     * Setter of $name
     * @param string $name Name of $value are set
     * @param string $value Value of $name are set
     */
    function __set($name,$value) {
        $this->$name = $value;
    }

    /**
     * Getter of $name
     * @param string $name Values of $name are get
     */
    function __get($name) {
        return $this->$name;
    }

    /**
     * Constructor
     * @param string $attribute attribute like Student, Teacher
     * @param string $op Operation like Create, Read
     */
    public function __construct() {
        $this->entity=(isset($_REQUEST['entity']) ? $_REQUEST['entity'] : 'default'); 
        $this->action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : null);
        $this->parameter=(isset($_REQUEST['parameter']) ? $_REQUEST['parameter'] : null);
    }
}
