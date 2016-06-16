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
        require_once 'C:\xampp\htdocs\STC_MVC\rootdirectory.php';
        require_once ROOTPATH.'/core/controllers/controller_factory.php';
        require_once ROOTPATH.'/app/views/layouts/default.php';
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
