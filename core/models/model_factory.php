<?php
/**
 * Contains Model Factory
 */

/**
 * Model_factory gives the object of Appropriate Model
 */
class model_factory {
    /**
     * Gives the objest of Appropriate Model
     * @param string $model Name of the Model
     */
    public function getModel($model) {
        if(isset($model)){
            return new $model();
        }
        else{
            return false;
        }
    }
}
