<?php
/**
 * This file contais code for Controllers
 */

/**
 * Namespaces
 */
namespace core\controllers;

/**
 * Controller_factory is a class which will give appropriate controller object
 */
class controllerFactory {
    /**
     * Takes the parameter and according to it gives the appropriate object
     * @param string $request Request object  like Teacher, Student or Teacher
     */
    static public function getController($request)
    {
        if($request->__get("entity")!=null){
        $className=  lcfirst($request->__get("entity"));
        $className='app'.DS.'controllers'.DS.$className.'Controller';
        return new $className($request->__get("entity"));
        }
        else{
            return false;
        }
        
    }
}
