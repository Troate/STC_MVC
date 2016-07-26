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
     * @var object Layout can be default or ajax
     */
    public $layout='default';
    /**
     * @var Object Object of viewManager class
     */
    public $view;
    /**
     * @var bool 
     */
    public $render=true;
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
        $this->view=new viewManager();
        $this->view->layout=  $this->layout;
    }
    /**
     * It calls either view or appropriate action functions of class
     * @param object $req Object of request class
     */
    public function _action($req){
        $func=$req->__get("action");
        $this->view->model=  self::$model;
        $bool=$this->$func($req);
        if($this->render){
            $this->view->action=  $req->__get('action');
            $this->view->entity=  $req->__get('entity');
            $this->view->display();
        }
    }
    public function __call($name, $argument) {
        
    }
    function index($req)
    {
        $req->__set('action','read');
        if($req->__get('entity')=='default'){
            $this->view->viewPath= ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.'welcome.php';
         }
        $this->_action($req);
        exit();
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
     * @param array $req It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($req) {
        if($req->parameter!=null){
        try{
            $parameter=$req->__get("parameter");
            $this->checkEmpty($parameter);              //checks if any string parameter is empty
            
            self::$model=  $this->setModelValues(self::$model, $parameter);
            
            if(self::$model->insert()==false)
            {
                throw new \Exception;
            }
            
            $this->view->action='success';
            }
            catch (\Exception $e){                      // Sends to error.php in case of error
                $this->view->action='error';
            }
            $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$this->view->action.'.php';
            return;
        }
            $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$req->__get('action').'.php';
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @param array $req It has values for select and where clause
     * @return array Populated with the result of select query
     */
    public function read($req) {
        if($req->entity!='default'){
        try{
        $parameter=$req->__get("parameter");
        $model_array=self::$model->select($parameter);
        if($model_array==false){
            throw new \Exception;
        }
        $model=  self::$model;
        $this->view->cols= $this->name;
        if(isset($parameter['select'])){
            $model->__set('cols',$parameter['select']);
        }
        $entity=  self::$model->__get("class");
        $this->view->model_array=  $model_array;
        $this->view->model=  $model;
        $this->view->action=  $req->action;
        $this->view->entity=  $entity;
        }
        catch(\Exception $e){
            $this->view->action='error';
        }
        }
        if($req->entity=='default'){
            $this->view->action='welcome';
        }
        $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$this->view->action.'.php';
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param array $req It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($req) {
        if($req->parameter!=null){
        try{
            $parameter=$req->__get("parameter");
            $this->checkEmpty($parameter);
            
            self::$model=$this->setModelValues(self::$model, $parameter);
            
            if(self::$model->del()==false)
            {
                throw new \Exception;
            }
            
            $this->view->action='success';
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            $this->view->action='error';
        }
            $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$this->view->action.'.php';
            return;
        }
        $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$req->__get('action').'.php';
    }
    /**
     * Creates object, initialize with old values and then set new Values
     * @param array $req It has values from different attributes, which can vary in number according to attributes
     * @throws Exception Exception takes to Error page error.php
     */
    public function update($req) {
        if($req->parameter!=null){
        try{
            $parameter=$req->__get("parameter");
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
            
            $this->view->action='success';
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            $this->view->action='error';
        }
            $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$this->view->action.'.php';
            return;
        }
        $this->view->viewPath=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$req->__get('action').'.php';
    }
}

