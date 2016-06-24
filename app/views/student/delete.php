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
        <form action='index.php' method="POST">
            Name:<br>
            <input type="text" name="parameter[0]" placeholder="Name of Student" /><br>
            Age:<br>
            <input type="number" name="parameter[1]" min="0" placeholder="Age of Student" /><br>
            Degree:<br>
            <input type="text" name="parameter[2]" placeholder="Degree of Student" /><br><br>
            <input type="text" name="func" value="<?php echo  $op;?>" style="display: none;"/>
            <input type="text" name="class" value="<?php echo $field;?>" style="display: none;"/>
            <button name="delete" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * View of the Student Delete Functionality
             */
            ?>
    </body>
</html>
