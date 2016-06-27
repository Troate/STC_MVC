<?php
/**
 * Request Class
 */

/**
 * Request Class
 */
namespace core\utils;
use core\controllers\controllerFactory;
class req
{
    private $field;
    private $op;
    private $parameter;
    private $func;
    private $class;
    function setParameter($parameter) {
        $this->parameter=array();
        $count=count($parameter);
        for ($i=0;$i<$count;$i++){
            $this->parameter[$i] = $parameter[$i];
        }
    }

    function setFunc($func) {
        $this->func = $func;
    }

    function setClass($class) {
        $this->class = $class;
    }

    public function __construct($field, $op) {
        $this->field=$field;
        $this->op=$op;
    }
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
    
    public function callControllerFunction() {
        $obj=new controllerFactory();
        $s=$obj->getController($this->class);
        $func=$this->func;
        $bool=$s->$func($this->parameter);
    }
}
