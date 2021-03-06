<?php
/**
 * Contains the Model Teacher
 */

/**
 * Namespaces
 */
namespace app\models;
use core\models\baseModel;

/**
 * Teacher has Name, Age and Course
 */
class Teacher extends baseModel {
    /**
     * @var int $age Age of the Teacher
     */
    protected $age;
    /**
     *
     * @var string $course Course of the Teacher
     */
    protected $course;
}