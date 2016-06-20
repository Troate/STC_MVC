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
        <h3>Enter Data</h3>
        <form action='/STC_MVC/app/views/course/delete.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name of Course" /><br>
            Course Id:<br>
            <input type="text" name="course" placeholder="Id of Course" /><br><br>
            <button name="delete" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * View of the Course Delete Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\core\controllers\controller_factory.php';
            include_once $_SESSION['Root'].'\app\controllers\course_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $course= (string)(isset($_POST['course']) ? $_POST['course'] : null);
            if(isset($_POST['delete'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $obj=new controller_factory();
                $s=$obj->getController("Course");
                $bool=$s->delete("course",$name, $course);
                if($bool==true)
                {
                    header('Location: \STC_MVC\public\index.php');
                    die();
                }
                else if($bool==false)
                {
                    header('Location: \STC_MVC\core\views\error.php');
                    die();
                }
            }
            ?>
    </body>
</html>
