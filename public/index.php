<?php
/**
 * It is the Single Entry point, It gets the Field and Operation from default.php and according to that make field_controller object through controller factory and gives its function operation as parameter
 */
// Namespace
use core\utils\req;
use core\controllers\controllerFactory;
use core\controllers\homeController;
use core\controllers\defaultController;

$field=null;
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
if(isset($_REQUEST['field'])||isset($_REQUEST['func'])){
    $request = new req((isset($_REQUEST['field']) ? $_REQUEST['field'] : null), 
                        (isset($_REQUEST['operation']) ? $_REQUEST['operation'] : null),
                        (isset($_REQUEST['func']) ? $_REQUEST['func'] : null),
                        (isset($_REQUEST['class']) ? $_REQUEST['class'] : null),
                        (isset($_REQUEST['parameter']) ? $_REQUEST['parameter'] : null));     // Makes object of wrapper class

    $field=$request->__get("field");
    $op=$request->__get("op");
    $func=$request->__get("func");
    $class=$request->__get("class");
    $parameter=$request->__get("parameter");

    /**
     * These values are set when index.php is post of views
     */
    if(isset($func)&&isset($class))
    {
        $obj=new controllerFactory();
        $s=$obj->getController($request->__get("class"));
        $func=$request->__get("func");
        $bool=$s->$func($request->__get("parameter"));
        return $bool;
    }

    /**
     * If the field and operatio are set, then it makes appropriate object from controller factory and passes $opeartion as parameter to the function callOp()
     */
    if(isset($field) && isset($op)){
        $obj=new controllerFactory();
        $controller=$obj->getController($request->__get("field"));
        if($request->__get("op")=="list"){
            $controller->read();
        }
        else{
            $controller->callOp($request->__get("op"),$request->__get("field"));
        }
    }
    else if (isset($field)) {
        $obj=new defaultController();
        $obj->callOp($field);
    }
}
else {
     $obj=new homeController();
     $obj->callOp();
}