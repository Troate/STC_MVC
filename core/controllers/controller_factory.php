<?php
/**
 * This file contais code for Controllers
 */


/**
 * Controller_factory is a class which will give appropriate controller object
 */
class controller_factory {
    /**
     * Takes the parameter and according to it gives the appropriate object
     * @param string $field Name of the field like Teacher, Student or Teacher
     */
    public function getController($field)
    {
        if(isset($field)){
        $className=  lcfirst($field);
        $className=$className.'_controller';
        return new $className($field);
        }
        else{
            return false;
        }
        
    }
}
