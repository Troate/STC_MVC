<?php
/**
 * This file contais code for Controllers
 */

/**
 * Include Models
 */
require_once $_SESSION['Root'].'\app/controllers/student_controller.php';
require_once $_SESSION['Root'].'\app/controllers/teacher_controller.php';
require_once $_SESSION['Root'].'\app/controllers/course_controller.php';


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
        if ($field == "Student") {
            return new student_controller($field);
        }else if($field=="Teacher"){
            return new teacher_controller($field);
        }else if($field=="Course"){
            return new course_controller($field);
        }
        
    }
}
