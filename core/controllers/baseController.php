<?php
/**
 * Base Controller of the different_controllers
 */
namespace core\controllers;
use core\controllers\controllerInterface;
use core\models\modelFactory;
use core\models\database\Dbal;

/**
 * Parent Class of the Student, Teacher and Course Controller
 */
//
class baseController implements controllerInterface
{
    /**
     * @var Object $model Static model, it will be initialized in constructor when object will be made 
     */
    public static $model;
    /**
     * Its a construtor, which initialases $model with appropriate object
     * @param string $field It is passed to modelfactory, which gives appropriate object of Model i.e.(Course, Teacher, Student)
     */
    public function __construct($field) {
        $modelFactory=new modelFactory();
        self::$model=$modelFactory->getModel($field);
    }
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     * @param string $field This field will call the $op of specific $field
     */
    public function CallOp($op, $field) {
        $model=  self::$model;
        if($op=="create"){
            require_once ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$op.'.php';
        }
        else{
            require_once ROOT.DS.'app'.DS.'views'.DS.$field.DS.$op.'.php';
        }
    }
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course, Teacher or Student
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($parameter) {
        try{
            foreach($parameter as $param)
                {
                    if(gettype($param)=='string'&&strlen($param)==0)
                    {
                        throw new \Exception();
                    }
                }
            $class=get_class(self::$model);
            $class=  str_replace('\\', '', $class);
            $class=  str_replace('app', '', $class);
            $class=  str_replace('models', '', $class);
            $name=self::$model->getCols();
            $count=  count($name);
            $names=array();
            $values=array();
            for($i=0;$i<$count-1;$i++)
            {
                $setFunc='set'.$name[$i+1];
                $getFunc='get'.$name[$i+1];
                self::$model->$setFunc($parameter[$i]);
                $names[$i]=$name[$i+1];
                $values[$i]=  self::$model->$getFunc();
            }
            $d=new Dbal();
            $d->insertQuery($class,$names,$values);
            return true;
            }
            catch (\Exception $e){
                header('Location: '.DS.'STC_MVC'.DS.'core'.DS.'views'.DS.'error.php');
                return false;
            }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $mod= new modelFactory();
        $class=get_class(self::$model);
        $class=  str_replace('\\', '', $class);
        $class=  str_replace('app', '', $class);
        $class=  str_replace('models', '', $class);
        $model_array= $mod->getModel(ucfirst($class));
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery($class);
        $name=  self::$model->getCols();
        while($row= $res->fetch())
        {
            $m=$mod->getModel(ucfirst($class));
            foreach($name as $nam){
                $funcName='set'.$nam;
                $m->$funcName($row[$nam]);
            }
            array_push($model_array, $m);
        }
        $model=  self::$model;
        require_once ROOT.DS.'app'.DS.'views'.DS.$class.DS.'list.php';
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string_array $parameter It Contains following parameters
     * @param string $name Name of the Course
     * @param string $courseid Id of the Course
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        try{
                foreach($parameter as $param)
                {
                    if(gettype($param)=='string'&&strlen($param)==0)
                    {
                        throw new \Exception();
                    }
                }
                $class=get_class(self::$model);
                $class=  str_replace('\\', '', $class);
                $class=  str_replace('app', '', $class);
                $class=  str_replace('models', '', $class);
                $name=self::$model->getCols();
                $count=  count($name);
                $names=array();
                $values=array();
                for($i=1;$i<$count;$i++)
                {
                    $setFunc='set'.$name[$i];
                    $getFunc='get'.$name[$i];
                    self::$model->$setFunc($parameter[$i-1]);
                    $names[$i-1]=$name[$i];
                    $values[$i-1]=  self::$model->$getFunc();
                }
                $d=new Dbal();
                $d->deleteQuery($class,$names,$values);
                return true;
            }
            catch (\Exception $e){
                header('Location: '.DS.'STC_MVC'.DS.'core'.DS.'views'.DS.'error.php');
                return false;
            }
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
        try{
            foreach($parameter as $param)
                {
                    if(gettype($param)=='string'&&strlen($param)==0)
                    {
                        throw new \Exception();
                    }
                }
                $class=get_class(self::$model);
                $class=  str_replace('\\', '', $class);
                $class=  str_replace('app', '', $class);
                $class=  str_replace('models', '', $class);
                $name=self::$model->getCols();
                $count=count($name);
                $names=array();
                $values=array();
                $i=1;
                for(;$i<$count;$i++)
                {
                    $setFunc='set'.$name[$i];
                    $getFunc='get'.$name[$i];
                    self::$model->$setFunc($parameter[$i-1]);
                    $names[$i-1]=$name[$i];
                    $values[$i-1]=  self::$model->$getFunc();
                }
                for(;$i<($count*2)-1;$i++)
                {
                    $values[$i-1]=$parameter[$i-1];
                }
                $d=new Dbal();
                $d->updateQuery($class,$names,$values);
                return true;
            }
            catch (\Exception $e){
                header('Location: '.DS.'STC_MVC'.DS.'core'.DS.'views'.DS.'error.php');
                return false;
            }
    }
}

