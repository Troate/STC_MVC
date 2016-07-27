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
     * @var array Array of parameters
     */
    public $parameters;
    /**
     * Calls view according to layout
     */
    public function display() {
        $parameter=$this->parameters;
        if(file_exists(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->parameters['layout'].'.php')){
            include ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->parameters['layout'].'.php';
        }
    }
    public function setViewPath(){
        $this->parameters['viewPath']=ROOT.DS.'app'.DS.'views'.DS.$this->parameters['entity'].DS.$this->parameters['action'].'.php';
        if(!file_exists($this->parameters['viewPath'])){
            $this->parameters['viewPath']=ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$this->parameters['action'].'.php';
        }
    }
}