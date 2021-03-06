<?php
/**
 * Contains the Model Course
 */

/**
 * Namespaces
 */
namespace app\models;
use core\models\baseModel;

/**
 * Course has Name and CourseId
 */
class Course extends baseModel {
    
    /**
     * @var string $code CourseId of the Course
     */
    protected $courseid;
}
