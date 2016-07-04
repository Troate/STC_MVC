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
$obj=new controllerFactory();
if(isset($_REQUEST['attribute'])||isset($_REQUEST['func'])){
    $request = new req((isset($_REQUEST['attribute']) ? $_REQUEST['attribute'] : null), 
                        (isset($_REQUEST['operation']) ? $_REQUEST['operation'] : null),
                        (isset($_REQUEST['func']) ? $_REQUEST['func'] : null),
                        (isset($_REQUEST['class']) ? $_REQUEST['class'] : null),
                        (isset($_REQUEST['parameter']) ? $_REQUEST['parameter'] : null));     // Makes object of wrapper class

    $attribute=$request->__get("attribute");
    $op=$request->__get("op");
    $func=$request->__get("func");
    $class=$request->__get("class");
    $parameter=$request->__get("parameter");

    /**
     * These values are set when index.php is post of views
     */
    if(isset($func)&&isset($class))
    {
        $s=$obj->getController($request->__get("class"));
        $func=$request->__get("func");
        $bool=$s->$func($request->__get("parameter"));
        return $bool;
    }

    /**
     * If the attribute and operation are set, then it makes appropriate object from controller factory and passes $opeartion as parameter to the function callOp()
     */
    if(isset($attribute) && isset($op)){
        
        $controller=$obj->getController($request->__get("attribute"));
        if($request->__get("op")=="list"){
            $controller->read();
        }
        else{
            $controller->callOp($request->__get("op"),$request->__get("attribute"));
        }
    }
    /**
     * If only attribute is set and not operation
     */
    else if (isset($attribute)) {
        $controller=$obj->getController("default");
        $controller->callOp("default",$request->__get("attribute"));
    }
}
/**
 * If nothing is set
 */
else {
     $controller=$obj->getController("home");
     $controller->callOp("home",null);
}