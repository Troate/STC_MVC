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
        <h3>Teacher</h3>
        <form action='index.php' method="POST">
            <?php
            /**
             * View of the Teacher Delete Functionality
             */
            $i=1; 
            require_once ROOT.DS.'core'.DS.'views'.DS.$op.'.php';
            ?>
            <button name="delete" type="submit" value="delete">Delete</button>
        </form>
    </body>
</html>
