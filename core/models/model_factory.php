<?php
/**
 * Contains Model Factory
 */

/**
 * Includes Models
 */
include_once 'C:\xampp\htdocs\STC_MVC\index.php';
require ROOTPATH.'\app/models/course.php';
require ROOTPATH.'\app/models/teacher.php';
require ROOTPATH.'\app/models/student.php';

/**
 * Model_factory gives the object of Appropriacte Model
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
    }
}
