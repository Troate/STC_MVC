<?php
/**
 * Request Class
 */

/**
 * Namespaces
 */
namespace core\utils;
use core\controllers\controllerFactory;

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
     * Setter of $parameter
     * @param string_array $parameter Values of $parameter are set into $this->parameter
     */
    function setParameter($parameter) {
        $this->parameter=array();
        $count=count($parameter);
        for ($i=0;$i<$count;$i++){
            $this->parameter[$i] = $parameter[$i];
        }
    }

    /**
     * Setter of $func
     * @param string $func Value of $func are set into $this->func
     */
    function setFunc($func) {
        $this->func = $func;
    }

    /**
     * Setter of $class
     * @param string $class Values of $class are set into $this->class
     */
    function setClass($class) {
        $this->class = $class;
    }

    /**
     * Constructor
     * @param string $field Field like Student, Teacher
     * @param string $op Operation like Create, Read
     */
    public function __construct($field, $op) {
        $this->field=$field;
        $this->op=$op;
    }
    /**
     * Calls the callOp() function of controller or read() function if Operation is to read
     */
    public function callController() {
        $obj=new controllerFactory();
        $controller=$obj->getController($this->field);
        if($this->op=="list"){
            $controller->read();
        }
        else{
            $controller->callOp($this->op,$this->field);
        }
    }
    
    /**
     * Calls the Create, Update and Delete functions of controller
     * It recieves data from views via post
     */
    public function callControllerFunction() {
        $obj=new controllerFactory();
        $s=$obj->getController($this->class);
        $func=$this->func;
        $bool=$s->$func($this->parameter);
        return $bool;
    }
}
