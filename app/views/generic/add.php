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
        <a href="/STC_MVC/index.php">Click Here</a> to go back to main page<br>
        <h3>Enter Data</h3>
        <form action='/STC_MVC/app/views/generic/add.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name" /><br><br>
            Choose a Field:<br>
            <input name="field" type="radio" value="Student">Student
            <input name="field" type="radio" value="Teacher">Teacher
            <input name="field" type="radio" value="Course">Course<br><br>
<!--            Age:<br>
            <input type="number" name="age" min="0" placeholder="Age of Student" /><br>
            Degree:<br>
            <input type="text" name="degree" placeholder="Degree of Student" /><br><br>-->
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
            include_once $_SESSION['Root'].'\app\views\generic\addUser.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $field = (isset($_POST['field']) ? $_POST['field'] : null);
            if(isset($_POST['add'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new addUser($field);
                $s->create($field,$name);
            }
            ?>
    </body>
</html>
