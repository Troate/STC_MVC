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
        <h3><?php
        /**
         * General Create View
         */
        echo ucfirst($entity);
        ?></h3>
        <form action="index.php" method="post">
            <?php
            echo '<h3>Enter Data</h3>';
            $attr=$model->__get("cols");
            $num=$model->__get("numeric");
            for($i=0;$i<count($attr)-1;$i++)
            {
                echo $attr[$i+1];
                echo '<br><input ';
                if(array_search($attr[$i+1], $num))
                {
                    echo 'type="number" min="0" ';
                }
                else
                {
                    echo 'type="text" ';
                }
                
                echo 'name="parameter['.($i).']" placeholder="'.$attr[$i+1].' of '.ucfirst($entity).'"/><br>';
            }
            ?>
            <input type="text" name="entity" value="<?php echo $entity; ?>" style="display: none;"/>
            <input type="text" name="action" value="<?php echo $action; ?>" style="display: none;"/><br>
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
