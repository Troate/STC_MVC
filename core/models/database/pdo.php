<?php
/**
 * It is the PDO Database
 */

/**
 * Namespcaes
 */
namespace core\models\database;
use core\models\database\drivers\pdo\pdoDrivers;
use core\models\database\Dbal;

/**
 * It is the PDO to connect to Database, and get the values from and into the Database
 */
class pdo implements Dbal{
    /**
     * @var array Contains last Id of Tables
     */
    public $string;
    /**
     * @var array Array of values to be inserted 
     */
    public $val=array();
    /**
     * Run query to insert the values in table
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string/int_array $cell_values Contains the values that are to be inserted in Table
     */
    function insertQuery($tableName, $cell_names, $cell_values) {
        $count=count($cell_values);                     // $count has count of columns
        $string="insert into $tableName (";             // query is being constructed and tablename is given to it
        for ($i=0;$i<$count;$i++) {                     // This loop is iterated to append column names in which 
                                                        //  values will be inserted
            $string= $string. "$cell_names[$i],";
        }
        $string=rtrim($string,",");                     // Trim the last comma from loop
        $string=$string." ) values (";                  // Now values is concatenated
        for ($i=0;$i<$count;$i++) {                     // This loop is iterated to put ? according to the count of columns
            $string= $string. "?,";
        }
        $string=rtrim($string,",");                     // Trim the last comma from loop
        $string=$string." )";                           // query is now ready
        try{
        pdoDrivers::execute($string, $cell_values);
        return true;
        }
        catch(\PDOException $e)                         // returns false if there is any error
        {
            global $error;
            $error='Could Not Insert Given Data';
            return false;
        }
    }
    
    /**
     * Concatenate the Columns one want to print
     * @param string $col Columns one want to print
     * @return object $this
     */
    function select($col) {
        $this->string='select ';
        foreach ($col as $c){
            $this->string=$this->string.$c.', ';
        }
        $this->string=  rtrim($this->string, ', ');
        $this->string=$this->string.' ';
        return $this;
    }
    /**
     * Concatenate Tablename in string
     * @param string $tableName
     * @return object $this
     */
    function from($tableName){
        $this->string=$this->string.'from '.$tableName.' ';
        return $this;
    }
    /**
     * Concatenate where clause in string
     * @param array $col Column names
     * @param array $val Values of the columns
     * @return object $this
     */
    function where($col,$val){
        $this->string=$this->string.'where ';
        for ($i=0;$i<count($col);$i++) {
            if($val[$col[$i]]!=0 ||  strlen($val[$col[$i]])!=0)
            {
                $this->string=  $this->string.$col[$i].'=? and ';
                array_push($this->val, $val[$col[$i]]);
            }
        }
        $this->string=  rtrim($this->string, ' and ');
        return $this;
    }
    /**
     * Execute query
     * @global string $error
     * @return object $this
     */
    function executeQuery()
    {
        try{
        if(isset($this->val))
        {
            $res= pdoDrivers::execute($this->string,  $this->val);
        }
        else{
            $res= pdoDrivers::query($this->string);               // query is executed
        }
        if($res->rowCount()<=0){
            throw new \PDOException;
        }
        return $res;                                    // The result is returned
        }
        catch(\PDOException $e)                         // returns false if there is any error
        {
            global $error;
            $error='Could Not Find Given Data';
            return false;
        }
    }
    /**
     * Runs Delete Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell_name Name of the Columns
     * @param string/int_array $cell_values Values of those Columns
     * @throws Exception If there are no resultant rows
     */
    function deleteQuery($tableName, $cell_name, $cell_values) {
        $count=count($cell_values);                     // $count has count of columns
        $string="delete from $tableName where ";        // query is being constructed and tablename is given to it
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";   // appends cell name and ?
        }
        $string=  rtrim($string," and ");               // Trim the last 'and' from the loop 
        try{
        $stmt=  pdoDrivers::execute($string, $cell_values);
        if($stmt->rowCount()<=0)                        // If no column is deleted throws exception
        {    
            throw new \PDOException;
        }
        return true;
        }
        catch(\PDOException $e)                         // returns false
        {
            global $error;
            $error='Could Not Find Given Data';
            return false;
        }
    }
    /**
     * Run Update Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell_name Name of the Columns
     * @param string/int_array $cell_values Value of the Columns
     * @throws Exception If there are no resultant rows
     */
    function updateQuery($tableName,$cell_name,$cell_values) {
        $count=count($cell_name);                       // $count has count of columns
        $string="update $tableName set ";               // query is being constructed and tablename is given to it
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=?, ";      // appends cell name and ?
        }
        $string=  rtrim($string,", ");                  // Trim the last comma from the query
        $string=$string." where ";                      // concatenate where in the string to match with old values
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";   // appends cell name and ?
        }
        $string=  rtrim($string," and ");               // Trim the last 'and' from the query
        try{
        $stmt=  pdoDrivers::execute($string, $cell_values);
        if($stmt->rowCount()<=0)                        // If no column is updated throws exception
        {    
            throw new \Exception;
        }
        return true;
        }
        catch(\PDOException $e)                         // return false
        {
            global $error;
            $error='Could Not Find Given Data';
            return false;
        }
    }
    /**
     * Takes in table name and returns id of last inserted item
     * @param string $tableName Table of which last inserted value is to be known
     * @return int Id of last inserted Item
     */
    public function lastinsert($tableName) {
        $string="SELECT  `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME =  '$tableName'";
        $r=  pdoDrivers::query($string);
        $res=$r->fetch();
        $id=$res['AUTO_INCREMENT']-1;
        return $id;
    }
}
