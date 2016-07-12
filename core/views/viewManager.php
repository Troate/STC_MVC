<?php
/**
 * Manages View
 */


require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'header.php';
if($entity=="default")
{
    require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'default.php';
}
else{
    require_once ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$action.'.php';

    if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$entity.DS.$action.'.php')){
        require_once ROOT.DS.'app'.DS.'views'.DS.$entity.DS.$action.'.php';
    }
    else{
        return false;
}
}
require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'footer.php';;