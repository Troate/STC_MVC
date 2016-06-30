<?php
/**
 * Contains the Model Student
 */

/**
 * Namespaces
 */
namespace app\models;
use core\models\baseModel;

/**
 * Student has Name, Age and Degree
 */
class Student extends baseModel{
    
    /**
     * @var int $age Age of the Student
     */
    protected $age;
    /**
     * @var string $degree Degree of the Student
     */
    protected $degree;
    
}