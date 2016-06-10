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
        <h3>Select One Operation</h3>
            <form action="#" method="POST">
            <button name="operation" type="submit" value="create">Create</button>
            <button name="operation" type="submit" value="read">Read</button>
            <button name="operation" type="submit" value="update">Update</button>
            <button name="operation" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * This File contains operations of CRUD
             */
            
            //$field is used for setting field like student, teacher or course
            $operation= (isset($_POST['operation']) ? $_POST['operation'] : null);
            echo $operation;
            ?>
    </body>
</html>
