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
        <h3><?php echo ucfirst($field)?></h3>
        <form action="index.php" method="post">
            <?php
            echo '<h3>Enter Data</h3>';
            $attr=$model->getCols();
            for($i=0;$i<count($attr)-1;$i++)
            {
                echo $attr[$i+1];
                echo '<br><input ';
                $get='get'.$attr[$i+1];
                if(gettype($model->$get())=='integer')
                {
                    echo 'type="number" min="0" ';
                }
                else 
                {
                    echo 'type="text" ';
                }
                echo 'name="parameter['.($i).']" placeholder="'.$attr[$i+1].' of '.ucfirst($field).'"/><br>';
            }
            ?>
            <input type="text" name="class" value="<?php echo $field; ?>" style="display: none;"/>
            <input type="text" name="func" value="<?php echo $op; ?>" style="display: none;"/><br>
            <button name="add" type="submit" value="create">Create</button>
        </form>
            <?php
            /**
             * View of the Course, Teacher and Student Add Functionality
             */
            $name= (string)(isset($_POST['nam']) ? $_POST['nam'] : null);
            ?>
    </body>
</html>