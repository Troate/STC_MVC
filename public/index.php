<?php
/**
 * It is the Single Entry point, It gets the attribute and Operation from default.php and according to that make attribute_controller object through controller factory and gives its function operation as parameter
 */
// Namespace
use core\utils\req;
use core\controllers\controllerFactory;


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

require_once ROOT.DS.'app'.DS.'config.php';

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
    
    $controller=controllerFactory::getController($request);
    $controller->_action($request);

    
