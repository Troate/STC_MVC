<?php
/**
 * Manages View
 */


require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'header.php';
if(isset($home))
{
    require_once ROOT.DS.'core'.DS.'views'.DS.'home.php';
}
else if(isset($default))
{
    require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'default.php';
}
else{
    require_once ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$op.'.php';

    if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$attribute.DS.$op.'.php')){
        require_once ROOT.DS.'app'.DS.'views'.DS.$attribute.DS.$op.'.php';
    }
    else{
        return false;
}
}
require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'footer.php';;