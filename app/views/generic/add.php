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
        <a href="/STC_MVC/public/index.php">Click Here</a> to go back to main page<br>
        <h3>Enter Data</h3>
        <form action='/STC_MVC/app/views/generic/add.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name" /><br><br>
            Choose a Field:<br>
            <input name="field" type="radio" value="Student">Student
            <input name="field" type="radio" value="Teacher">Teacher
            <input name="field" type="radio" value="Course">Course<br><br>
            <button name="add" type="submit" value="create">Create</button>
            </form>
            <?php
            /**
             * View of the Course, Teacher and Student Add Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\core\controllers\controller_factory.php';
            include_once $_SESSION['Root'].'\app\controllers\course_controller.php';
            include_once $_SESSION['Root'].'\app\controllers\teacher_controller.php';
            include_once $_SESSION['Root'].'\app\controllers\student_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $field = (isset($_POST['field']) ? $_POST['field'] : null);
            if(isset($_POST['add'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $obj=new controller_factory();
                $s=$obj->getController($field);
                $bool=$s->create($field,$name);
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
