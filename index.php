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
        define('ROOTPATH', 'C:\xampp\htdocs\STC_MVC');
        // put your code here
        $field=null;
        $operation=null;
        require_once ROOTPATH.'/core/controllers/controller_factory.php';
        require_once ROOTPATH.'/app/views/layouts/default.php';
        if(isset($field)&&isset($operation)){
        $obj=new controller_factory();
        $controller=$obj->getController($field);
        $controller->callOp($operation);
        }
        ?>
    </body>
</html>
