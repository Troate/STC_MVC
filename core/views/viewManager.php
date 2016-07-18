<?php
/**
 * Manages View
 */
namespace core\views;
/**
 * viewManager class displays views
 */
class viewManager{
    /**
     * @var Object Object of Model
     */
    public $model;
    /**
     * @var array Array of Models in case of list the output
     */
    public $model_array;
    /**
     * @var string Contains name of class
     */
    public $entity;
    /**
     * @var string Contains name of action
     */
    public $action;
    /**
     * @var string Contains type of layout
     */
    public $layout;
    /**
     * Calls view according to layout
     */
    public function display() {
        $model=  $this->model;
        if(isset($this->model_array))
        {
            $model_array=  $this->model_array;
        }
        $entity=  $this->entity;
        $action=  $this->action;
        if(file_exists(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->layout.'.php')){
            require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->layout.'.php';
        }

    }
}