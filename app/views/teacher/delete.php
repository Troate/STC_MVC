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
        <form action='/STC_MVC/app/views/teacher/delete.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name of Teacher" /><br>
            Age:<br>
            <input type="number" name="age" min="0" placeholder="Age of Teacher" /><br>
            Course:<br>
            <input type="text" name="course" placeholder="Course of Teacher" /><br><br>
            <button name="delete" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * View of the Teacher Delete Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\app\controllers\teacher_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $age= (string)(isset($_POST['age']) ? $_POST['age'] : null);
            $course= (string)(isset($_POST['course']) ? $_POST['course'] : null);
            if(isset($_POST['delete'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new teacher_controller("Teacher");
                $s->delete("teacher",$name, $age, $course);
            }
            ?>
    </body>
</html>
