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
            require_once 'C:\xampp\htdocs\STC_MVC\rootdirectory.php';
            include_once ROOTPATH.'\app\controllers\course_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $course= (string)(isset($_POST['course']) ? $_POST['course'] : null);
            if(isset($_POST['delete'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new course_controller("Course");
                $s->delete("course",$name, $course);
            }
            ?>
    </body>
</html>