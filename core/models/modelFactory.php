<?php
/**
 * Contains Model Factory
 */

/**
 * Namespaces
 */
namespace core\models;

/**
 * Model_factory gives the object of Appropriate Model
 */
class modelFactory {
    /**
     * Gives the objest of Appropriate Model
     * @param string $model Name of the Model
     */
    public function getModel($model) {
        if(isset($model)){
            $class='app'.DS.'models'.DS.$model;
            return new $class();
        }
        else{
            return false;
        }
    }
}
