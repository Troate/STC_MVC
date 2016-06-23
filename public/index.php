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
        define("ROOT", dirname(__DIR__));
        define('DS', DIRECTORY_SEPARATOR);
        require_once ROOT.DS.'core'.DS.'models'.DS.'modelInterface.php';
        require_once ROOT.DS.'core'.DS.'controllers'.DS.'base_controller.php';
        
        require_once ROOT.DS.'core'.DS.'models'.DS.'User.php';
        require_once ROOT.DS.'core'.DS.'controllers'.DS.'controller_factory.php';
        require_once ROOT.DS.'core'.DS.'models'.DS.'model_factory.php';
        require_once ROOT.DS.'app'.DS.'models'.DS.'course.php';
        require_once ROOT.DS.'app'.DS.'models'.DS.'teacher.php';
        require_once ROOT.DS.'app'.DS.'models'.DS.'student.php';
        require_once ROOT.DS.'app'.DS.'controllers'.DS.'student_controller.php';
        require_once ROOT.DS.'app'.DS.'controllers'.DS.'teacher_controller.php';
        require_once ROOT.DS.'app'.DS.'controllers'.DS.'course_controller.php';
        require_once ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'default.php';
        
        require_once ROOT.DS.'core'.DS.'models'.DS.'database'.DS.'DbConnection.php';
        require_once ROOT.DS.'core'.DS.'utils'.DS.'req.php';
        session_start();
        if(isset($_POST['func'])&&isset($_POST['class']))
        {
            $parameter=$_POST['parameter'];
            print_r($parameter);
            $func=$_POST['func'];
            $class=$_POST['class'];
            $obj=new controller_factory();
            $s=$obj->getController($class);
            $bool=$s->$func($parameter);
        }
            
        $request = new req($field, $operation);
        /**
         * If the field and operatio are set, then it makes appropriate object from controller factory and passes $opeartion as parameter to the function callOp()
         */
        if(isset($field) && isset($operation)){
            $obj=new controller_factory();
            $controller=$obj->getController($field);
            if($operation=="list"){
                $controller->read();
            }
            else{
                $controller->callOp($operation,$field);
            }
        }
        
        ?>
    </body>
</html>
