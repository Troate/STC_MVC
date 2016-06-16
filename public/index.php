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
        
        $field=null;
        $operation=null;
        /**
         * Includes
         */
        if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
        define("ROOT", __DIR__);
        define("ROOTPATH",rtrim(ROOT,'\public'));
        $_SESSION['Root']=ROOTPATH;
        require_once $_SESSION['Root'].'/core/controllers/controller_factory.php';
        require_once $_SESSION['Root'].'/app/views/layouts/default.php';
        /**
         * If the field and operatio are set, then it makes appropriate object from controller factory and passes $opeartion as parameter to the function callOp()
         */
        if(isset($field)&&isset($operation)){
        $obj=new controller_factory();
        $controller=$obj->getController($field);
        $controller->callOp($operation);
        }
        ?>
    </body>
</html>
