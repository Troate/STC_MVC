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
            <input type="text" name="parameter[2]" placeholder="Name of Course" /><br>
            Old Course Id:<br>
            <input type="text" name="parameter[3]" placeholder="Id of Course" /><br><br>
            <h3>Enter Your New Data</h3>
            Name:<br>
            <input type="text" name="parameter[0]" placeholder="New Name of Course" /><br>
            Course:<br>
            <input type="text" name="parameter[1]" placeholder="New Id of Course" /><br><br>
            <input type="text" name="func" value="<?php echo $field;?>" style="display: none;"/>
            <input type="text" name="class" value="<?php echo $operation;?>" style="display: none;"/>
            <button name="update" type="submit" value="update">Update</button>
            </form>
            <?php
            /**
             * View of the Course Update Functionality
             */
            ?>
    </body>
</html>
