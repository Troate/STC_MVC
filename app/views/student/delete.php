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
        <form action='/STC_MVC/app/views/student/delete.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name of Student" /><br>
            Age:<br>
            <input type="number" name="age" min="0" placeholder="Age of Student" /><br>
            Degree:<br>
            <input type="text" name="degree" placeholder="Degree of Student" /><br><br>
            <button name="delete" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * View of the Student Delete Functionality
             */
            /**
             * Includes
             */
            require_once 'C:\xampp\htdocs\STC_MVC\rootdirectory.php';
            include_once ROOTPATH.'\app\controllers\student_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $age= (string)(isset($_POST['age']) ? $_POST['age'] : null);
            $degree= (string)(isset($_POST['degree']) ? $_POST['degree'] : null);
            if(isset($_POST['delete'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new student_controller("Student");
                $s->delete("student",$name, $age, $degree);
            }
            ?>
    </body>
</html>
