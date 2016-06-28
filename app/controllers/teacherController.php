<?php
/**
 * Teacher Controller
 */

/**
 * Namespaces
 */
namespace app\controllers;
use core\controllers\baseController;

/**
 * Object of teacher_controller will made to access its functions. These functions make the Object of Model for ORM
 */
class teacherController extends baseController{
    /**
     * Magic function is defined as empty, so if someone calls non-declared function they will not see errors
     * @param string $name Default parameter, does nothing
     * @param string $arguments Default parameter, does nothing
     */
    public function __call($name, $arguments) {
        
    }
    /**
     * Its a construtor, which initialases $model with appropriate object
     * @param string $field It is passed to modelfactory, which gives appropriate object of Model i.e.(Course, Teacher, Student)
     */
    public function __construct($field) {
        parent::__construct($field);
    }
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     * @param string $field This field will call the $op of specific $field
     */
    public function callOp($op,$field) {
        $field="teacher";
        return  parent::CallOp($op, $field);
    }
    /**
     * Calls Parent Function
     * @param string_array $parameter It Contains following parameters
     * Name of Teacher
     * Age of Teacher
     * Course of Teacher
     */
    public function create($parameter) {
        return parent::create($parameter);
    }
    /**
     * Calls Parent Function
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        return parent::read();
    }
    /**
     * Calls Parent Function
     * @param string_array $parameter It Contains following parameters
     * Name of Teacher
     * Age of Teacher
     * Course of Teacher
     */
    public function delete($parameter) {
        parent::delete($parameter);
    }
    
    /**
     * Calls Parent Function
     * @param string_array $parameter It Contains following parameters
     * Old Name of Teacher
     * Old Age of Teacher
     * Old Course of Teacher
     * New Name of Teacher
     * New Age of Teacher
     * New Course of Teacher
     */
    public function update($parameter) {
        return parent::update($parameter);
    }
}
