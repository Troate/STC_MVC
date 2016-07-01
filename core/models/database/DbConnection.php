<?php
/**
 * Connects to the Database
 */

/**
 * Namespaces
 */
namespace core\models\database;

/**
 * It has static variable to connect only once to Database
 */
class DbConnection {
    /**
     * @var PHPPlatform Private Static, so no one can access it, and its available through out the project once initialized
     */
    private static $connection=null;
    
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
    private function __wakeup() {
    
}
    /**
     * Connects to Database, if connection already doesnot exist otherwise returns same connection and also connects to database
     * @return PDO_object Resource
     */
    public static function getConnection() {
        require_once ROOT.DS.'app'.DS.'config.php';
      if (!isset(self::$connection)) {
        $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        self::$connection = new \PDO($DB['DB_TYPE'].":host=".$DB['DB_HOST'].";dbname=".$DB['DB_NAME']."", $DB['DB_USER'], $DB['DB_PASSWORD'], $pdo_options)or die("PDO object not created");
      }
      return self::$connection;
    }

}
