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
 * This provides the basic selection of Professions and Operations
 */
 //$attribute is used for setting attribute like student, teacher or course
if($entity=="default")
{
    ?>
    <h3>Welcome to Default Page<br>
    Select one of the Entity and then Select One Action</h3>
    <form action="index.php" method="POST">
    <input name="entity" type="radio" value="Student">Student</input>
    <input name="entity" type="radio" value="Teacher">Teacher</input>
    <input name="entity" type="radio" value="Course">Course</input><br><br>
    <button name="action" type="submit" value="create">Add</button>
    <button name="action" type="submit" value="read">Read</button>
    <button name="action" type="submit" value="update">Update</button>
    <button name="action" type="submit" value="delete">Delete</button><br>
    </form>
    <?php
}
else{
    include ROOT.DS.'app'.DS.'views'.DS.'generic'.DS.$action.'.php';

    if(file_exists(ROOT.DS.'app'.DS.'views'.DS.$entity.DS.$action.'.php')){
        include ROOT.DS.'app'.DS.'views'.DS.$entity.DS.$action.'.php';
    }
    else{
        return false;
    }
}
?>
</body>
</html>