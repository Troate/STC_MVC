<?php
/**
 * It is the Single Entry point, It gets the attribute and Operation from default.php and according to that make attribute_controller object through controller factory and gives its function operation as parameter
 */
// Namespace
use core\utils\req;
use core\controllers\controllerFactory;
use core\controllers\homeController;
use core\controllers\defaultController;

$attribute=null;
$operation=null;
// Constants
/**
 * ROOT has Root directory of Project
 */
define("ROOT", dirname(__DIR__));
/**
 * DS is Directoy Separator of Operating System
 */
define('DS', DIRECTORY_SEPARATOR);


/**
 * Autoloader function
 * @param string $class Name of Class
 */
function __autoload($class){
    $class=$class.'.php';
    $fileName=  ROOT.DS.str_replace('\\', DS, $class);
    if(file_exists($fileName))
    {
        require_once $fileName;
    }
    else
    {
        echo $fileName.' Could not be Included in Index.php<br>';
    }
}
    $request = new req();     // Makes object of wrapper class
    /**
     * These values are set when index.php is post of views
     */
        $controller=controllerFactory::getController($request->__get("entity"));
        $controller->_action($request);

    
