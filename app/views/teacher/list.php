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
        <?php
        /**
        * View of the Teacher List Functionality
        */
       /**
        * Includes
        */
        if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
        include_once $_SESSION['Root'].'\core\controllers\controller_factory.php';
        include_once $_SESSION['Root'].'\app\controllers\teacher_controller.php';
        $obj=new controller_factory();
        $s=$obj->getController("Teacher");
        $model_array=$s->read();
        echo '<h3>Teacher</h3><table><tr><th style="min-width:100px ">Name</th><th style="min-width:100px ">Age</th><th style="min-width:100px ">Course</th></tr>';
        foreach($model_array as $m)
        {
            echo '<tr><td style="text-align:center">'.$m->getName().'</td><td style="text-align:center">'.$m->getAge().'</td><td style="text-align:center">'.$m->getCourse().'</td></tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>
