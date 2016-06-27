<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /**
         * It is the Single Entry point, It gets the Field and Operation from default.php and according to that make field_controller object through controller factory and gives its function operation as parameter
         */
        use core\utils\req;
        $field=null;
        $operation=null;
        /**
         * Includes
         */
        define("ROOT", dirname(__DIR__));
        define('DS', DIRECTORY_SEPARATOR);
        
        require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'default.php';

        function __autoload($class){
            $class=$class.'.php';
            $fileName=  ROOT.DS.str_replace('\\', DS, $class);
            if(file_exists($fileName))
            {
                require_once $fileName;
            }
            else
            {
                echo $fileName.' Could not be Included in Index.php<br>';
            }
        }
        
        $request = new req($field, $operation);
        if(isset($_POST['func'])&&isset($_POST['class']))
        {
            $request->setParameter($_POST['parameter']);
            $request->setFunc($_POST['func']);
            $request->setClass($_POST['class']);
            $request->callControllerFunction();
        }
            
        /**
         * If the field and operatio are set, then it makes appropriate object from controller factory and passes $opeartion as parameter to the function callOp()
         */
        if(isset($field) && isset($operation)){
            $request->callController();
        }
        
        ?>
    </body>
</html>
