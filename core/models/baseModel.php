<?php
/**
 * Contains User Class
 */
 
/**
 * Namespaces
 */
namespace core\models;
use core\models\modelFactory;
use app\config;

/**
 * Parent Class of Student, Teacher and Course
 */
class baseModel implements modelInterface
{
    /**
     * @var object Object of Database type
     */
    private $db;
    /**
     * @var string $class Name of the Class
     */
    private $class;
    /**
     *
     * @var int $id This id is assigned value according the id of course in database 
     */
    private $id;
    /**
     * @var string $name Name of User
     */
    private $name;
    /**
     * @var array $cols Name of columns in database
     */
    private $cols;
    /**
     * @var array $numeric It has those names of columns which are Numeric 
     */
    private $numeric;
    /**
     * @var array $names It has those names of columns in which value is inserted
     */
    public $names;
    /**
     * @var array $values It has those values which are inserted in $names
     */
    public $values;
    /**
     * Constructor
     * Sets the Name of the Columns and call setCols function
     */
    public function __construct() {
        $this->names=array();
        $this->values=array();
        $class=get_called_class();                                          // getting caller class/Model
        $class=  str_replace('\\', '', $class);                             // parsing class/Model name
        $class=  str_replace('app', '', $class);
        $class=  str_replace('models', '', $class);
        $class=  lcfirst($class);
        $this->__set("class",$class);
        $class= ROOT.DS.'app'.DS.'models'.DS.'metadata'.DS.$class.'.php';
        if(file_exists($class)){                                            // checking if metadata of model exists
            require_once $class;
        }
        $func='meta'.ucfirst($this->__get("class"));                        // Get Name of Columns from metadata
        $cols=$func();
        $this->__set('cols',$cols[0]);
        $this->__set('numeric',$cols[3]);
        global $DB;
        $db="core\models\database\\".$DB['db'];
        $this->db=new $db();
    }
    /**
     * Setter of member
     * @param string $name Name of the member whose value is to set
     * @param string $value Value to be set to $name
     */
    public function __set($name,$value) {
        $this->$name = $value;
    }
    /**
     * Getter of member
     * @param string $name Name of the member whose value is to get
     * @return string Value of $name
     */
    public function __get($name) {
        return $this->$name;
    }
    /**
     * Calls the Database insert function
     */
    public function insert() {                                                // Object of Database Access Layer Model
        try{
        $n=  $this->names;
        for($i=0;$i<count($n);$i++)
        {
            $this->values[$i]=  $this->__get($n[$i]);
        }
        return $this->db->insertQuery($this->__get("class"),  $this->names,  $this->values);// insertQuery function of Dbal is called, parameters are tablename,
                                                                        //  cellnames and values to be inserted in those cellnames
        }
        catch(\Exception $e)
        {
            global $error;
            $error='Could Not Insert Data';
            return false;
        }
    }
    /**
     * Checks if nothing is given in where clause
     * @param array $param 2D Array of where clause
     */
    public function checkEmpty($param) {
        foreach ($param as $p)
        {
            if(strlen($p)!=0){
                return true;
            }
        }
        return false;
    }
    /**
     * Calls select function of Database
     * @param array $parameter Array of parameters from REQUEST
     * @return array Model Array which contains all the result
     */
    public function select($parameter) {
        try{
        $lastId=$this->db->lastinsert($this->__get("class"));
        $model_array=array();
        if(isset($parameter['select'])){
            $attr=$parameter['select'];
        }
        else{
            $attr=$this->__get('cols');
        }
        $chain=$this->db->select($attr)->from($this->__get("class"));
        if(self::checkEmpty($parameter['where'])){
            $chain->where($this->__get('cols'),$parameter['where']);
        }
        $res=  $chain->executeQuery();
        if($res==false){
            throw new \Exception;
        }
        // Columns from database
        $name=  $attr;
        while($row= $res->fetch())
        {
            $m=modelFactory::getModel(ucfirst($this->__get("class")));
            foreach($name as $nam){
                $m->__set(lcfirst($nam),$row[$nam]);      // Values are set into model
            }
            array_push($model_array, $m);       // Object is pushed into array of Models
        }
        return $model_array;
        }
        catch(\Exception $e)
        {
            global $error;
            $error='Could Not Display Data';
            return false;
        }
    }
    /**
     * Calls the Database delete function
     */
    public function del() {                                                     // Object of Database Access Layer Model
        try{
        $n=  $this->names;
        for($i=0;$i<count($n);$i++)
        {
            $this->values[$i]=  $this->__get($n[$i]);
        }
        return $this->db->deleteQuery($this->__get("class"),  $this->names,  $this->values);// deleteQuery function of Dbal is called, parameters are tablename,
                                                                        //  cellnames and values to be inserted in those cellnames
        }
        catch(\Exception $e)
        {
            global $error;
            $error='Could Not Delete Data';
            return false;
        }
    }
    /**
     * Calls update function on Database
     * @param object $m Model which contains new values
     */
    public function update($m)
    {
        try{
        $n=  $this->names;
        $i=0;
        for(;$i<count($n);$i++)
        {
            $this->values[$i]=  $this->__get($n[$i]);
        }
        for($j=0;$j<count($n);$i++,$j++)
        {
            $this->values[$i]=$m->__get($n[$j]);
        }
        return $this->db->updateQuery($this->__get("class"),  $this->names,  $this->values);         // updateQuery function of Dbal is called, parameters are tablename,
                                                        //  cellnames and values to be inserted in those cellnames
        }
        catch(\Exception $e)
        {
            global $error;
            $error='Could Not Update Data';
            return false;
        }
    }
}
