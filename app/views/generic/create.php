<h3><?php
/**
 * General Create View
 */
echo ucfirst($parameter['entity']);
?></h3>
<form action="index.php" method="post">
    <?php
    echo '<h3>Enter Data</h3>';
    $attr=$parameter['model']->__get("cols");
    $num=$parameter['model']->__get("numeric");
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

        echo 'name="parameter['.($i).']" placeholder="'.$attr[$i+1].' of '.ucfirst($parameter['entity']).'"/><br>';
    }
    ?>
    <input type="text" name="entity" value="<?php echo $parameter['entity']; ?>" style="display: none;"/>
    <input type="text" name="action" value="<?php echo $parameter['action']; ?>" style="display: none;"/><br>
    <button name="add" type="submit" value="create">Create</button>
</form>
    <?php
    /**
     * View of the Course, Teacher and Student Add Functionality
     */
    ?>