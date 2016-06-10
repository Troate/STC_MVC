<?php
/**
 * This code contains Student Controller
 */

/**
 * Includes Student Model Class
 */
require_once 'C:\xampp\htdocs\STC_MVC\index.php';
require ROOTPATH.'\core/models/model_factory.php';

/**
 * Student_controller this creates Student Model
 */
class student_controller{
    public static $model;
    public function __call($name, $arguments) {
        
    }
    public function __construct($field) {
        $modelFactory=new model_factory();
        self::$model=$modelFactory->getModel($field);
        
    }
    public function create() {
        echo 'in create()';
        require_once ROOTPATH.'/app/views/student/add.php';
        self::$model->setName($name);
        self::$model->setAge($age);
        self::$model->setDegree($degree);
        $values[0]="";
        echo $values[1]=self::$model->getName();
        echo $values[2]=self::$model->getAge();
        echo $values[3]=self::$model->getDegree();
        $d=new Dbal();
        $d->insertQuery("student",$values);
    }
}
