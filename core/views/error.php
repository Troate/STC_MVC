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
        <h1>An Error Occurred</h1>
        <?php
        /**
         * Contains Simple Message Error and a Link to the Main page
         */
        global $error;
        echo $error;
        ?>
        <br>
        <br>
        <a href="/STC_MVC/public\index.php">Click Here</a> to go back to main page<br>
    </body>
</html>
