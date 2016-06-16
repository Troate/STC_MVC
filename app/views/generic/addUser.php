<?php
/**
* Contains code to add user
*/
/**
* Includes
*/
require_once 'C:\xampp\htdocs\STC_MVC\rootdirectory.php';
require_once ROOTPATH.'\core/models/model_factory.php';
require_once ROOTPATH.'\core/models/database/Dbal.php';

/**
 * addUser is made to call the create funtion
 */
class addUser {
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
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course, Teacher or Student
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($tableName,$name) {
        try{
            if($name==''||$tableName=='')
            {throw new Exception;}
            self::$model->setName($name);
            $values[0]="";
            $values[1]=self::$model->getName();
            $d=new Dbal();
            $d->insertQuery($tableName,$values);
            header('Location: \STC_MVC\index.php');
            die();
        }
        catch (Exception $e)
        {
            header('Location: \STC_MVC\core\views\error.php');
            die();
        }
    }
}