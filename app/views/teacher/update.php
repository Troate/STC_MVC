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
        <form action='index.php' method="POST">
            Old Name:<br>
            <input type="text" name="parameter[3]" placeholder="Name of Teacher" /><br>
            Old Age:<br>
            <input type="number" name="parameter[4]" min="0" placeholder="Age of Student" /><br>
            Old Course:<br>
            <input type="text" name="parameter[5]" placeholder="Course of Teacher" /><br><br>
            <h3>Enter Your New Data</h3>
            Name:<br>
            <input type="text" name="parameter[0]" placeholder="New Name of Teacher" /><br>
            Age:<br>
            <input type="number" name="parameter[1]" min="0" placeholder="New Age of Teacher" /><br>
            Course:<br>
            <input type="text" name="parameter[2]" placeholder="New Course of Teacher" /><br><br>
            <input type="text" name="func" value="<?php echo  $op;?>" style="display: none;"/>
            <input type="text" name="class" value="<?php echo $field;?>" style="display: none;"/>
            <button name="update" type="submit" value="update">Update</button>
            </form>
            <?php
            /**
             * View of the Teacher Update Functionality
             */
            ?>
    </body>
</html>
