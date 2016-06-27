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
        <div style="margin: auto;">
            <h3>Select One Field or Press Add Button to Add a User</h3>
            <form action="#" method="POST">
            <input name="field" type="radio" value="Student">Student
            <input name="field" type="radio" value="Teacher">Teacher
            <input name="field" type="radio" value="Course">Course
            <br><br>
            <button name="operation" type="submit" value="create">Add</button>
            <button name="operation" type="submit" value="list">Read</button>
            <button name="operation" type="submit" value="update">Update</button>
            <button name="operation" type="submit" value="delete">Delete</button><br>
            </form>
        <?php
        /**
        * This provides the the basic selection of Professions and Operations
        */
        //$field is used for setting field like student, teacher or course
        $field = (isset($_POST['field']) ? $_POST['field'] : null);
        $operation= (isset($_POST['operation']) ? $_POST['operation'] : null);
        ?>
        </div>
    </body>
</html>
