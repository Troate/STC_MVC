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
            $file=ROOT.DS.'app'.DS.'models'.DS.lcfirst($model).'.php';
            if(file_exists($file))
            {
                return new $class();
            }
            else
            {
                return false;
            }
        }
        else{
            return false;
        }
    }
}
