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
    public $cols;
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
     * @var string Address of view
     */
    public $viewPath;
    /**
     * Calls view according to layout
     */
    public function display() {
        $model=  $this->model;
        $mod=$this->cols;
        if(isset($this->model_array))
        {
            $model_array=  $this->model_array;
        }
        $entity=  $this->entity;
        $action=  $this->action;
        $path=$this->viewPath;
//        if($this->entity=='default')
//        {
//            $path=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.'welcome.php';
//        }
        $path2=ROOT.DS.'app'.DS.'views'.DS.$entity.DS.$action.'.php';
        if(file_exists(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->layout.'.php')){
            include ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->layout.'.php';
        }

    }
}