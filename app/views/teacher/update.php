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
        <form action='/STC_MVC/app/views/teacher/update.php' method="POST">
            Old Name:<br>
            <input type="text" name="oname" placeholder="Name of Teacher" /><br>
            Old Age:<br>
            <input type="number" name="oage" min="0" placeholder="Age of Student" /><br>
            Old Course:<br>
            <input type="text" name="ocourse" placeholder="Course of Teacher" /><br><br>
            <h3>Enter Your New Data</h3>
            Name:<br>
            <input type="text" name="name" placeholder="New Name of Teacher" /><br>
            Age:<br>
            <input type="number" name="age" min="0" placeholder="New Age of Teacher" /><br>
            Course:<br>
            <input type="text" name="course" placeholder="New Course of Teacher" /><br><br>
            <button name="update" type="submit" value="update">Update</button>
            </form>
            <?php
            /**
             * View of the Teacher Update Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\app\controllers\teacher_controller.php';
            $oname= (string)(isset($_POST['oname']) ? $_POST['oname'] : null);
            $oage= (string)(isset($_POST['oage']) ? $_POST['oage'] : null);
            $ocourse= (string)(isset($_POST['ocourse']) ? $_POST['ocourse'] : null);
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $age= (string)(isset($_POST['age']) ? $_POST['age'] : null);
            $course= (string)(isset($_POST['course']) ? $_POST['course'] : null);
            if(isset($_POST['update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new teacher_controller("Teacher");
                $bool=$s->update("teacher",$name, $age, $course, $oname, $oage, $ocourse);
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
