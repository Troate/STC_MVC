<?php
/**
 * Course Controller
 */

/**
 * Includes other classes
 */
require_once $_SESSION['Root'].'\core/models/model_factory.php';
require_once $_SESSION['Root'].'\core/models/database/Dbal.php';

/**
 * Object of course_controller will made to access its functions. These functions make the Object of Model for ORM
 */
class course_controller {
    /**
     * @var Object $model Static model, it will be initialized in constructor when object will be made 
     */
    public static $model;
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
        $modelFactory=new model_factory();
        self::$model=$modelFactory->getModel($field);
    }
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     */
    public function callOp($op) {
        if($op=="read"){
            require_once ROOTPATH.'/app/views/course/list.php';
        }
        if($op=="delete"){
            require_once ROOTPATH.'/app/views/course/delete.php';
        }
        if($op=="update"){
            require_once ROOTPATH.'/app/views/course/update.php';
        }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $mod= new model_factory();
        $model_array= $mod->getModel("Course");
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery("course");
        while($row= $res->fetch())
        {
            $m=$mod->getModel("Course");
            $m->setId($row['Id']);
            $m->setName($row['Name']);
            $m->setCourseId($row['CourseId']);
            array_push($model_array, $m);
        }
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course
     * @param string $courseid Id of the Course
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($tableName,$name,$courseid) {
        try{
                if(strlen($name)==0||strlen($courseid)==0)
                {throw new Exception;}
                self::$model->setName($name);
                self::$model->setCourseId($courseid);
                $names[0]="name";
                $names[1]="courseid";
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getCourseId();
                $d=new Dbal();
                $d->deleteQuery($tableName,$names,$values);
                header('Location: \STC_MVC\index.php');
                die();
                return true;
            }
            catch (Exception $e){
                header('Location: \STC_MVC\core\views\error.php');
                die();
                return false;
            }
    }
    
    /**
     * Creates object, initialize with old values and then set new Values
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name New Name of Course
     * @param string $courseid New CourseId
     * @param string $oname Old name of Course
     * @param string $ocourseid Old CourseId
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($tableName,$name,$courseid,$oname,$ocourseid) {
        try{
                if(strlen($name)==0||strlen($courseid)==0||strlen($oname)==0||strlen($ocourseid)==0)
                {throw new Exception;}
                $names[0]="name";
                $names[1]="courseid";
                self::$model->setName($name);
                self::$model->setCourseId($courseid);
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getCourseId();
                $values[2]=$oname;
                $values[3]=$ocourseid;
                $d=new Dbal();
                $d->updateQuery($tableName,$names,$values);
                header('Location: \STC_MVC\index.php');
                die();
                return true;
            }
            catch (Exception $e){
                header('Location: \STC_MVC\core\views\error.php');
                die();
                return false;
            }
    }
}
