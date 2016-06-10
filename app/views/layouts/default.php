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
            <h3>Select One Field</h3>
            <form action="#" method="POST">
            <button name="field" type="submit" value="Student">Student</button>
            <button name="field" type="submit" value="Teacher">Teacher</button>
            <button name="field" type="submit" value="Course">Course</button>
            </form>
        <?php
        /**
        * This provides the the basic selection of Professions and Operations
        */
        
        //$field is used for setting field like student, teacher or course
        $field = (isset($_POST['field']) ? $_POST['field'] : null);
        ?>
        </div>
    </body>
</html>
