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
        <form action='/STC_MVC/app/views/student/delete.php' method="POST">
            Name:<br>
            <input type="text" name="name" placeholder="Name of Student" /><br>
            Age:<br>
            <input type="number" name="age" min="0" placeholder="Age of Student" /><br>
            Degree:<br>
            <input type="text" name="degree" placeholder="Degree of Student" /><br><br>
            <button name="delete" type="submit" value="delete">Delete</button>
            </form>
            <?php
            /**
             * View of the Student Delete Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\core\controllers\controller_factory.php';
            include_once $_SESSION['Root'].'\app\controllers\student_controller.php';
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $age= (string)(isset($_POST['age']) ? $_POST['age'] : null);
            $degree= (string)(isset($_POST['degree']) ? $_POST['degree'] : null);
            if(isset($_POST['delete'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $obj=new controller_factory();
                $s=$obj->getController("Student");
                $bool=$s->delete("student",$name, $age, $degree);
                if($bool==true)
                {
                    header('Location: \STC_MVC\public\index.php');
                    die();
                }
                else if($bool==false)
                {
                    header('Location: \STC_MVC\core\views\error.php');
                    die();
                }
            }
            ?>
    </body>
</html>
