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
        <a href="/STC_MVC/public/index.php">Click Here</a> to go back to main page<br>
        <h3>Enter Data</h3>
        <form action="index.php" method="post">
            Name:<br>
            <input type="text" name="parameter[1]" placeholder="Name" /><br><br>
            <input type="text" name="class" value="<?php echo $field; ?>" style="display: none;"/>
            <input type="text" name="parameter[0]" value="<?php echo $field; ?>" style="display: none;"/>
            <input type="text" name="func" value="create" style="display: none;"/>
            <button name="add" type="submit" value="create">Create</button>
        </form>
            <?php
            /**
             * View of the Course, Teacher and Student Add Functionality
             */
            $name= (string)(isset($_POST['nam']) ? $_POST['nam'] : null);
//            if(isset($_POST['add'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
//                $obj=new controller_factory();
//                $s=$obj->getController($field);
//                $bool=$s->create($field,$name);
//                if($bool==true)
//                {
//                    header('Location: \STC_MVC\public\index.php');
//                    die();
//                }
//                else if($bool==false)
//                {
//                    header('Location: \STC_MVC\core\views\error.php');
//                    die();
//                }
//            }
            ?>
    </body>
</html>
