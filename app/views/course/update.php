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
        <h3>Enter Old Data</h3>
        <form action='/STC_MVC/app/views/course/update.php' method="POST">
            Old Name:<br>
            <input type="text" name="oname" placeholder="Name of Course" /><br>
            Old Course Id:<br>
            <input type="text" name="ocourse" placeholder="Id of Course" /><br><br>
            <h3>Enter Your New Data</h3>
            Name:<br>
            <input type="text" name="name" placeholder="New Name of Course" /><br>
            Course:<br>
            <input type="text" name="course" placeholder="New Id of Course" /><br><br>
            <button name="update" type="submit" value="update">Update</button>
            </form>
            <?php
            /**
             * View of the Course Update Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\core\controllers\controller_factory.php';
            include_once $_SESSION['Root'].'\app\controllers\course_controller.php';
            $oname= (string)(isset($_POST['oname']) ? $_POST['oname'] : null);
            $ocourse= (string)(isset($_POST['ocourse']) ? $_POST['ocourse'] : null);
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $course= (string)(isset($_POST['course']) ? $_POST['course'] : null);
            if(isset($_POST['update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $obj=new controller_factory();
                $s=$obj->getController("Course");
                $bool=$s->update("course",$name, $course, $oname, $ocourse);
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
