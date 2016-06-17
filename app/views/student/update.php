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
        <form action='/STC_MVC/app/views/student/update.php' method="POST">
            Old Name:<br>
            <input type="text" name="oname" placeholder="Name of Student" /><br>
            Old Age:<br>
            <input type="number" name="oage" min="0" placeholder="Age of Student" /><br>
            Old Degree:<br>
            <input type="text" name="odegree" placeholder="Degree of Student" /><br><br>
            <h3>Enter Your New Data</h3>
            Name:<br>
            <input type="text" name="name" placeholder="New Name of Student" /><br>
            Age:<br>
            <input type="number" name="age" min="0" placeholder="New Age of Student" /><br>
            Degree:<br>
            <input type="text" name="degree" placeholder="New Degree of Student" /><br><br>
            <button name="update" type="submit" value="update">Update</button>
            </form>
            <?php
            /**
             * View of the Student Update Functionality
             */
            /**
             * Includes
             */
            if(session_status()!=PHP_SESSION_ACTIVE)
                { session_start();}
            include_once $_SESSION['Root'].'\app\controllers\student_controller.php';
            $oname= (string)(isset($_POST['oname']) ? $_POST['oname'] : null);
            $oage= (string)(isset($_POST['oage']) ? $_POST['oage'] : null);
            $odegree= (string)(isset($_POST['odegree']) ? $_POST['odegree'] : null);
            $name= (string)(isset($_POST['name']) ? $_POST['name'] : null);
            $age= (string)(isset($_POST['age']) ? $_POST['age'] : null);
            $degree= (string)(isset($_POST['degree']) ? $_POST['degree'] : null);
            if(isset($_POST['update'])&& $_SERVER['REQUEST_METHOD'] == "POST"){
                $s=new student_controller("Student");
                $bool=$s->update("student",$name, $age, $degree, $oname, $oage, $odegree);
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
