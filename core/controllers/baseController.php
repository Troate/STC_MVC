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
use core\models\database\Dbal;

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
            if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$field.DS.$op.'.php'))
            {require_once ROOT.DS.'app'.DS.'views'.DS.$field.DS.$op.'.php';}
            else{
                return false;
            }
        }
    }
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function create($parameter) {
        try{
            foreach($parameter as $param)       //checks if any string parameter is empty
            {
                if(gettype($param)=='string'&&strlen($param)==0)
                {
                    throw new \Exception();
                }
            }
            // Parse the class of Model so that it can be used to send tablename to database
            $class=get_class(self::$model);
            $class=  str_replace('\\', '', $class);
            $class=  str_replace('app', '', $class);
            $class=  str_replace('models', '', $class);
            
            $name=self::$model->getCols();              // $name has name of columns according to database
            $count=  count($name);                      // $count has count of columns
            $names=array();                             // $names has those names of columns in which value is inserted
            $values=array();                            // $values has those values which are inserted in $names
            for($i=0;$i<$count-1;$i++)
            {
                $setFunc='set'.$name[$i+1];             // setter function
                $getFunc='get'.$name[$i+1];             // getter function
                self::$model->$setFunc($parameter[$i]); // $parameter id set into model
                $names[$i]=$name[$i+1];                 // Column in which value will be inserted is set
                $values[$i]=  self::$model->$getFunc(); // value to be inserted in column is get
            }
            $d=new Dbal();                              // Object of Database Access Layer Model
            $d->insertQuery($class,$names,$values);     // insertQuery function of Dbal is called, parameters are tablename,
                                                        //  cellnames and values to be inserted in those cellnames
            return true;
            }
            catch (\Exception $e){                      // Sends to error.php in case of error
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
        // Parse the class of Model so that it can be used to send tablename to database
        $class=get_class(self::$model);
        $class=  str_replace('\\', '', $class);
        $class=  str_replace('app', '', $class);
        $class=  str_replace('models', '', $class);
        // Making array of Model, it will have object per row from the select query in databse on particular table
        $model_array= $mod->getModel(ucfirst($class));
        $model_array=array();
        // Object of Database Access Layer Model
        $d=new Dbal();
        $res=$d->selectQuery($class);
        // Columns from database
        $name=  self::$model->getCols();
        while($row= $res->fetch())
        {
            $m=$mod->getModel(ucfirst($class));
            foreach($name as $nam){
                $funcName='set'.$nam;
                $m->$funcName($row[$nam]);      // Values are set into model
            }
            array_push($model_array, $m);       // Object is pushed into array of Models
        }
        $model=  self::$model;
        require_once ROOT.DS.'app'.DS.'views'.DS.$class.DS.'list.php';
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string_array $parameter It has values from different fields, which can vary in number according to fields
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        try{
            foreach($parameter as $param)                   //checks if any string parameter is empty
            {
                if(gettype($param)=='string'&&strlen($param)==0)
                {
                    throw new \Exception();
                }
            }
            // Parse the class of Model so that it can be used to send tablename to database
            $class=get_class(self::$model);
            $class=  str_replace('\\', '', $class);
            $class=  str_replace('app', '', $class);
            $class=  str_replace('models', '', $class);

            $name=self::$model->getCols();                  // $name has name of columns according to database
            $count=  count($name);                          // $count has count of columns
            $names=array();                                 // $names has those names of columns in which value is inserted
            $values=array();                                // $values has those values which are inserted in $names
            for($i=1;$i<$count;$i++)
            {
                $setFunc='set'.$name[$i];                   // setter function
                $getFunc='get'.$name[$i];                   // getter function
                self::$model->$setFunc($parameter[$i-1]);   // $parameter id set into model
                $names[$i-1]=$name[$i];                     // Column in which value will be inserted is set
                $values[$i-1]=  self::$model->$getFunc();   // value to be inserted in column is get
            }
            $d=new Dbal();                                  // Object of Database Access Layer Model
            $d->deleteQuery($class,$names,$values);         // deleteQuery function of Dbal is called, parameters are tablename,
                                                            //  cellnames and values to be inserted in those cellnames
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            header('Location: '.DS.'STC_MVC'.DS.'core'.DS.'views'.DS.'error.php');
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
            foreach($parameter as $param)                   //checks if any string parameter is empty
            {
                if(gettype($param)=='string'&&strlen($param)==0)
                {
                    throw new \Exception();
                }
            }
            // Parse the class of Model so that it can be used to send tablename to database
            $class=get_class(self::$model);
            $class=  str_replace('\\', '', $class);
            $class=  str_replace('app', '', $class);
            $class=  str_replace('models', '', $class);
            
            $name=self::$model->getCols();                  // $name has name of columns according to database
            $count=  count($name);                          // $count has count of columns
            $names=array();                                 // $names has those names of columns in which value is inserted
            $values=array();                                // $values has those values which are inserted in $names
            $i=1;
            for(;$i<$count;$i++)
            {
                $setFunc='set'.$name[$i];                   // setter function
                $getFunc='get'.$name[$i];                   // getter function
                self::$model->$setFunc($parameter[$i-1]);   // $parameter id set into model
                $names[$i-1]=$name[$i];                     // Column in which value will be inserted is set
                $values[$i-1]=  self::$model->$getFunc();   // Old values to be inserted in column is get
            }
            for(;$i<($count*2)-1;$i++)
            {
                $values[$i-1]=$parameter[$i-1];             // New values to be inserted in column
            }
            $d=new Dbal();                                  // Object of Database Access Layer Model
            $d->updateQuery($class,$names,$values);         // updateQuery function of Dbal is called, parameters are tablename,
                                                            //  cellnames and values to be inserted in those cellnames
            return true;
        }
        catch (\Exception $e){                               // Sends to error.php in case of error
            header('Location: '.DS.'STC_MVC'.DS.'core'.DS.'views'.DS.'error.php');
            return false;
        }
    }
}

