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
     * @param string $attribute Name of the attribute like Teacher, Student or Teacher
     */
    static public function getController($attribute)
    {
        if(isset($attribute)){
        $className=  lcfirst($attribute);
        $className='app'.DS.'controllers'.DS.$className.'Controller';
        return new $className($attribute);
        }
        else{
            return false;
        }
        
    }
}
