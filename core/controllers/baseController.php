<?php
/**
 * Base Controller of the different_controllers
 */

/**
 * Namespaces
 */
namespace core\controllers;
use core\controllers\controllerInterface;
use core\models\modelFactory;

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
     * @var string $name $name has name of columns according to database
     */
    public $name;
    /**
     * @var int $count $count has count of columns
     */
    public $count;
    /**
     * Its a construtor, which initialases $model with appropriate object
     * @param string $field It is passed to modelfactory, which gives appropriate object of Model i.e.(Course, Teacher, Student)
     */
    public function __construct($field) {
        $modelFactory=new modelFactory();
        self::$model=$modelFactory->getModel($field);
        $this->name=self::$model->__get("cols");
        $this->count=  count($this->name);
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
            if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$field.DS.$op.'.php'))
            {require_once ROOT.DS.'app'.DS.'views'.DS.$field.DS.$op.'.php';}
            else{
                return false;
            }
        }
    }
    /**
     * Check for Empty values and throws exception
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function checkEmpty($parameter)
    {
        foreach($parameter as $param)                   //checks if any string parameter is empty
        {
            if(gettype($param)=='string'&&strlen($param)==0)
            {
                throw new \Exception();
            }
        }
    }
    /**
     * Set values in model
     * @param object $model Model in which value is to be set
     * @param array $parameter Values from View
     * @return object Set Model
     */
    public function setModelValues($model,$parameter)
    {
        for($i=0;$i<$this->count-1;$i++)
        {
            $model->names[$i]=  $this->name[$i+1];                 // Column in which value will be inserted is set
            $model->__set($model->names[$i],$parameter[$i]);       // $parameter id set into model
        }
        return $model;
    }
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($parameter) {
        try{
            $this->checkEmpty($parameter);              //checks if any string parameter is empty
            
            self::$model=  $this->setModelValues(self::$model, $parameter);
            
            self::$model->insert();
            
            
            return true;
            }
            catch (\Exception $e){                      // Sends to error.php in case of error
                require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
                return false;
            }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $model_array=self::$model->select();
        $model=  self::$model;
        require_once ROOT.DS.'app'.DS.'views'.DS.self::$model->__get("class").DS.'list.php';
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        try{
            $this->checkEmpty($parameter);
            
            self::$model=$this->setModelValues(self::$model, $parameter);
            
            self::$model->del();
            
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
            return false;
        }
    }
    /**
     * Creates object, initialize with old values and then set new Values
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($parameter) {
        try{
            $this->checkEmpty($parameter);
            
            self::$model=$this->setModelValues(self::$model, $parameter);
            $mod=new modelFactory();
            $m=$mod->getModel(ucfirst(self::$model->__get("class")));
            for($j=0,$i= $this->count;$i<($this->count*2)-1;$i++,$j++)
            {
                $values[$j]=$parameter[$i-1];             // New values to be inserted in column
            }
            $m=  $this->setModelValues($m, $values);
            self::$model->update($m);
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
            return false;
        }
    }
}

