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
     * @var string $field Field is like Student, Teacher and Course etc
     */
    private $field;
    /**
     * @var string $op Operation to be performed like Create, Read, Update and Delete
     */
    private $op;
    /**
     * @var string_array $parameter Values of different fields, which can vary in count according to Field
     */
    private $parameter;
    /**
     * @var string $func Function is same as operation
     */
    private $func;
    /**
     * @var string $class Class is same as Field
     */
    private $class;
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
     * @param string $field Field like Student, Teacher
     * @param string $op Operation like Create, Read
     */
    public function __construct($field, $op, $func, $class, $parameter) {
        $this->field=$field;
        $this->op=$op;
        $this->func=$func;
        $this->class=$class;
        $this->parameter=$parameter;
    }
}
