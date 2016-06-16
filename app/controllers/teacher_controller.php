<?php
/**
 * Teacher Controller
 */

/**
 * Includes other classes
 */
require_once $_SESSION['Root'].'\core/models/model_factory.php';
require_once $_SESSION['Root'].'\core/models/database/Dbal.php';

/**
 * Object of course_controller will made to access its functions. These functions make the Object of Model for ORM
 */
class teacher_controller {
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
            require_once ROOTPATH.'/app/views/teacher/list.php';
        }
        if($op=="delete"){
            require_once ROOTPATH.'/app/views/teacher/delete.php';
        }
        if($op=="update"){
            require_once ROOTPATH.'/app/views/teacher/update.php';
        }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $mod= new model_factory();
        $model_array= $mod->getModel("Teacher");
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery("teacher");
        while($row= $res->fetch())
        {
            $m=$mod->getModel("Teacher");
            $m->setId($row['Id']);
            $m->setName($row['Name']);
            $m->setAge($row['Age']);
            $m->setCourse($row['Course']);
            array_push($model_array, $m);
        }
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Teacher
     * @param string $age Age of the Teacher
     * @param string $course Name of the Course
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($tableName,$name,$age,$course) {
        try{
                if(strlen($name)==0||strlen($course)==0)
                {throw new Exception;}
                self::$model->setName($name);
                self::$model->setAge($age);
                self::$model->setCourse($course);
                $names[0]="name";
                $names[1]="age";
                $names[2]="course";
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getAge();
                $values[2]=self::$model->getCourse();
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
     * @param string $name New Name of Teacher
     * @param string $age New age of Teacher
     * @param string $course New Course
     * @param string $oname Old name of Teacher
     * @param string $oage Old agee of Teacher
     * @param string $ocourse Old Course
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($tableName,$name,$age,$course,$oname,$oage,$ocourse) {
        try{
                if(strlen($name)==0||strlen($course)==0||strlen($oname)==0||strlen($ocourse)==0)
                {throw new Exception;}
                $names[0]="name";
                $names[1]="age";
                $names[2]="course";
                self::$model->setName($name);
                self::$model->setAge($age);
                self::$model->setCourse($course);
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getAge();
                $values[2]=self::$model->getCourse();
                $values[3]=$oname;
                $values[4]=$oage;
                $values[5]=$ocourse;
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
