<?php
/**
 * Contains Model Factory
 */

/**
 * Includes Models
 */
require_once $_SESSION['Root'].'\app/models/course.php';
require_once $_SESSION['Root'].'\app/models/teacher.php';
require_once $_SESSION['Root'].'\app/models/student.php';

/**
 * Model_factory gives the object of Appropriate Model
 */
class model_factory {
    /**
     * Gives the objest of Appropriate Model
     * @param string $model Name of the Model
     */
    public function getModel($model) {
        if($model=="Teacher"){
            return new Teacher();
        }else if($model=="Student"){
            return new Student();
        }else if($model=="Course"){
            return new Course();
        }
        else{
            return false;
        }
    }
}
