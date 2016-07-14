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
use core\views\viewManager;
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
     * Layout can be default or ajax
     */
    public $layout;
    /**
     * Its a construtor, which initialases $model with appropriate object
     * @param string $entity It is passed to modelfactory, which gives appropriate object of Model i.e.(Course, Teacher, Student)
     */
    public function __construct($entity) {
        self::$model=modelFactory::getModel($entity);
        if(self::$model!=false)
        {
            $this->name=self::$model->__get("cols");
            $this->count=  count($this->name);
        }
    }
    /**
     * It calls either view or appropriate action functions of class
     * @param object $obj Object of request class
     */
    public function _action($obj){
        if($obj->__get("parameter")!=null)  // if parameters are set
        {
            $func=$obj->__get("action");
            $bool=$this->$func($obj->__get("parameter"));
            return $bool;
        }
        else                                // if parameters are not set then render views
        {
            if($obj->__get("action")=="list"){
                $this->read();
            }
            else{
                $this->layout='default';
                $parameter['layout']=  $this->layout;
                $parameter['model']=  self::$model;
                $parameter['action']=  $obj->__get('action');
                $parameter['entity']=  $obj->__get('entity');
                viewManager::display($parameter);
            }
        }
    }
    /**
     * Check for Empty values and throws exception
     * @param array $parameter It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function checkEmpty($parameter)
    {
        foreach($parameter as $param)                   //checks if any string parameter is empty
        {
            if(gettype($param)=='string'&&strlen($param)==0)
            {
                global $error;
                $error='Fields are Empty';
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
     * @param array $parameter It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($parameter) {
        try{
            $this->checkEmpty($parameter);              //checks if any string parameter is empty
            
            self::$model=  $this->setModelValues(self::$model, $parameter);
            
            if(self::$model->insert()==false)
            {
                throw new \Exception;
            }
            
            require_once ROOT.DS.'core'.DS.'views'.DS.'success.php';
            
            return true;
            }
            catch (\Exception $e){                      // Sends to error.php in case of error
                require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
                return false;
            }
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return array Populated with the result of select query
     */
    public function read() {
        try{
        $model_array=self::$model->select();
        if($model_array==false){
            throw new \Exception;
        }
        $model=  self::$model;
        $action='list';
        $entity=  self::$model->__get("class");
        $this->layout='default';
        $parameter['layout']=  $this->layout;
        $parameter['modelarray']=  $model_array;
        $parameter['model']=  $model;
        $parameter['action']=  $action;
        $parameter['entity']=  $entity;
        viewManager::display($parameter);
        return $model_array;
        }
        catch(\Exception $e){
            require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
            return false;
        }
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param array $parameter It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        try{
            $this->checkEmpty($parameter);
            
            self::$model=$this->setModelValues(self::$model, $parameter);
            
            if(self::$model->del()==false)
            {
                throw new \Exception;
            }
            
            require_once ROOT.DS.'core'.DS.'views'.DS.'success.php';
            
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
            return false;
        }
    }
    /**
     * Creates object, initialize with old values and then set new Values
     * @param array $parameter It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($parameter) {
        try{
            $this->checkEmpty($parameter);
            
            self::$model=$this->setModelValues(self::$model, $parameter);
            $m=  modelFactory::getModel(ucfirst(self::$model->__get("class")));
            for($j=0,$i= $this->count;$i<($this->count*2)-1;$i++,$j++)
            {
                $values[$j]=$parameter[$i-1];             // New values to be inserted in column
            }
            $m=  $this->setModelValues($m, $values);
            if(self::$model->update($m)==false)
            {
                throw new \Exception;
            }
            
            require_once ROOT.DS.'core'.DS.'views'.DS.'success.php';
            
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
            return false;
        }
    }
}

