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
        * View of the Student List Functionality
        */
       /**
        * Includes
        */
        require_once 'C:\xampp\htdocs\STC_MVC\rootdirectory.php';
        include_once ROOTPATH.'\app\controllers\student_controller.php';
        $s=new student_controller("Student");
        $model_array=$s->read();
        echo '<h3>Student</h3><table><tr><th style="min-width:100px ">Name</th><th style="min-width:100px ">Age</th><th style="min-width:100px ">Degree</th></tr>';
        foreach($model_array as $m)
        {
            echo '<tr><td style="text-align:center">'.$m->getName().'</td><td style="text-align:center">'.$m->getAge().'</td><td style="text-align:center">'.$m->getDegree().'</td></tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>