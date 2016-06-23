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
            if($name==''||$tableName=='')
            {throw new Exception;}
            self::$model->setName($name);
            $values[0]="";
            $values[1]=self::$model->getName();
            $d=new Dbal();
            $d->insertQuery(get_class(self::$model),$values);
            return true;
            }
            catch (Exception $e){
                return false;
            }
    }
}

