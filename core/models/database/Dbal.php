<?php
/**
 * It is the Database Access Layer
 */


/**
 * It is the DBAL to connect to Database, and get the values from and into the Database
 */
class Dbal {
    /**
     * @var PDO_object $pdo It is the object of PDO
     */
    private $pdo;
    /**
     * Constructor gets the PDO object to access Database
     */
    function __construct() {
        $this->pdo=DbConnection::getConnection();
    }
    /**
     * Run query to insert the values in table
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string/int_array $cell_values Contains the values that are to be inserted in Table
     */
    function insertQuery($tableName, $cell_values) {
        $count=count($cell_values);
        $string="insert into $tableName (Id,Name) values (";
        for ($i=0;$i<$count;$i++) {
            $string= $string. "?,";
        }
        $string=rtrim($string,",");
        $string=$string." )";
        echo $string."<br>";
        print_r($cell_values);
        try{
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
        return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    
    /**
     * Runs the select * Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @return PDO_Object Result of PDO_Query function
     */
    function selectQuery($tableName)
    {
        $string="select * from  $tableName ";
        try{
        $res= $this->pdo->query($string);
        return $res;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    
    /**
     * Runs Delete Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string_array $cell_name Name of the Columns
     * @param string/int_array $cell_values Values of those Columns
     * @throws Exception If there are no resultant rows
     */
    function deleteQuery($tableName, $cell_name, $cell_values) {
        $count=count($cell_values);
        $string="delete from $tableName where ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";
        }
        $string=  rtrim($string," and ");
        echo $string."<br>";
        print_r($cell_values);
        try{
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
        if($stmt->rowCount()<=0)
        {    
            throw new Exception;
        }
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    /**
     * Run Update Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string_array $cell_name Name of the Columns
     * @param string/int_array $cell_values Value of the Columns
     * @throws Exception If there are no resultant rows
     */
    function updateQuery($tableName,$cell_name,$cell_values) {
        $count=count($cell_name);
        $string="update $tableName set ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=?, ";
        }
        $string=  rtrim($string,", ");
        $string=$string." where ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";
        }
        $string=  rtrim($string," and ");
        echo $string."<br>";
        print_r($cell_values);
        try{
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
        if($stmt->rowCount()<=0)
        {    
            throw new Exception;
        }
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
}
