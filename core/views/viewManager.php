<?php
/**
 * Manages View
 */
namespace core\views;
/**
 * viewManager class displays views
 */
class viewManager{
    static public function display($parameter) {
        $model=$parameter['model'];
        if(isset($parameter['modelarray']))
        {
            $model_array=$parameter['modelarray'];
        }
        $entity=$parameter['entity'];
        $action=$parameter['action'];
        if($parameter['layout']=='default'){
            require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'header.php';
        }
        if($parameter['entity']=="default")
        {
            require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'default.php';
        }
        else{
            require_once ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$parameter['action'].'.php';

            if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$parameter['entity'].DS.$parameter['action'].'.php')){
                require_once ROOT.DS.'app'.DS.'views'.DS.$parameter['entity'].DS.$parameter['action'].'.php';
            }
            else{
                return false;
        }
        }
        if($parameter['layout']=='default'){
            require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'footer.php';
        }
    }
}