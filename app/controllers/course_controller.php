<?php
/**
 * Course Controller
 */
require_once ROOT.DS.'core'.DS.'controllers'.DS.'base_controller.php';
/**
 * Object of course_controller will made to access its functions. These functions make the Object of Model for ORM
 */
class course_controller extends baseController{
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
        $field="course";
        return  parent::CallOp($op, $field);
    }
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string_array $parameter It Contains following parameters
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course, Teacher or Student
     */
    public function create($parameter) {
        return parent::create($parameter);
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        return parent::read();
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string_array $parameter It Contains following parameters
     * @param string $name Name of the Course
     * @param string $courseid Id of the Course
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        parent::delete($parameter);
    }
    
    /**
     * Creates object, initialize with old values and then set new Values
     * @param string_array $parameter It Contains following parameters
     * @param string $name New Name of Course
     * @param string $courseid New CourseId
     * @param string $oname Old name of Course
     * @param string $ocourseid Old CourseId
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($parameter) {
        return parent::update($parameter);
    }
}
