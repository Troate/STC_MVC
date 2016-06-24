<?php
/**
 * Base Controller of the different_controllers
 */
require_once ROOT.DS.'core'.DS.'models'.DS.'database'.DS.'Dbal.php';
require_once ROOT.DS.'core'.DS.'controllers'.DS.'controller_interface.php';

/**
 * Parent Class of the Student, Teacher and Course Controller
 */

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
        $modelFactory=new model_factory();
        self::$model=$modelFactory->getModel($field);
    }
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     * @param string $field This field will call the $op of specific $field
     */
    public function CallOp($op, $field) {
        if($op=="add"){
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
        $tableName=$parameter[0];
        $name=$parameter[1];
        try{
            if(strlen($name)==0||strlen($tableName)==0)
            {throw new Exception;}
            self::$model->setName($name);
            $values[0]="";
            $values[1]=self::$model->getName();
            $d=new Dbal();
            $d->insertQuery(get_class(self::$model),$values);
            return true;
            }
            catch (Exception $e){
                header('Location: /STC_MVC/core/views/error.php');
                return false;
            }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $mod= new model_factory();
        $model_array= $mod->getModel(ucfirst(get_class(self::$model)));
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery(get_class(self::$model));
        $name=  self::$model->getCols();
        while($row= $res->fetch())
        {
            $m=$mod->getModel(ucfirst(get_class(self::$model)));
            foreach($name as $nam){
                $funcName='set'.$nam;
                $m->$funcName($row[$nam]);
            }
            array_push($model_array, $m);
        }
        require_once ROOT.DS.'app'.DS.'views'.DS.get_class(self::$model).DS.'list.php';
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
                        throw new Exception;
                    }
                }
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
                $d->deleteQuery(get_class(self::$model),$names,$values);
                return true;
            }
            catch (Exception $e){
                header('Location: /STC_MVC/core/views/error.php');
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
                        throw new Exception;
                    }
                }
                $name=self::$model->getCols();
                $count=  count($name);
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
                $d->updateQuery(get_class(self::$model),$names,$values);
                return true;
            }
            catch (Exception $e){
                header('Location: /STC_MVC/core/views/error.php');
                return false;
            }
    }
}

