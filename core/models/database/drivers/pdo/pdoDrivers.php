<?php
/**
 * Connects to the PDO Database
 */

/**
 * Namespaces
 */
namespace core\models\database\drivers\pdo;
use app\config;
/**
 * It has static variable to connect only once to Database
 */
class pdoDrivers {
    /**
     * @var PHPPlatform Private Static, so no one can access it, and its available through out the project once initialized
     */
    private static $connection=null;
    public static $lastid=0;
    /**
     * Conctructor made private so no one can access it
     */
    private function __construct() {}

    /**
     * __clone() made private so no one can access it
     */
    private function __clone() {}
    
    /**
     * __wakeup() made private so no one can access it
     */
    private function __wakeup() {}
    /**
     * Connects to Database, if connection already doesnot exist otherwise returns same connection and also connects to database
     * @return PDO_object Resource
     */
    public static function getConnection() {
        global $DB;
        try{
            if (!isset(self::$connection)) {
            $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
            self::$connection = new \PDO($DB["DB_TYPE"].":host=".$DB["DB_HOST"].";dbname=".$DB["DB_NAME"]."", $DB["DB_USER"], $DB["DB_PASSWORD"], $pdo_options)or die("PDO object not created");
            }
            return self::$connection;
        }
        catch (\PDOException $e){
            global $error;
            $error='Could Not Establish Connection';
            self::errorCall();
        }
    }
    
    /**
     * Prepares and Executes the Statement
     * @param string $string Prepared statement of PDO
     * @param string $cell_values Values to be inserted
     * @return Object PDO statement object which executes the prepared statement
     */
    public function execute($string, $cell_values) {
        try{
        $pdo=  self::getConnection();
        $stmt=  $pdo->prepare($string);           // query is prepared
        $stmt->execute($cell_values);
        return $stmt;
        }
        catch(\PDOException $e)
        {
            global $error;
            $error='Could Not Prepare and Execute Query';
            self::errorCall();
        }
    }
    /**
     * Run the simple query
     * @param string $string structured query
     * @return Object Object of result of query
     */
    public function query($string) {
        try{
        $pdo=self::getConnection();
        $res=$pdo->query($string);
        return $res;
        }
        catch(\PDOException $e)
        {
            global $error;
            $error='Could Not Run Query';
            self::errorCall();
        }
    }

    public function closeConnection() {
        self::$connection=null;
    }
    
    public function errorCall() {
        require_once ROOT.DS.'core'.DS.'views'.DS.'error.php';
    }
}