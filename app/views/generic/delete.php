<form action='index.php' method="POST">
<?php
/**
 * General Delete View
 */
echo '<h3>'.  ucfirst($model->__get("class")).'</h3>';
echo '<h3>Enter Data</h3>';
$attr=$model->__get("cols");
$num=$model->__get("numeric");
for($i=1;$i<count($attr);$i++)
{
    echo $attr[$i];
    echo '<br><input ';
    if(array_search($attr[$i], $num))
    {
        echo 'type="number" min="0" ';
    }
    else
    {
        echo 'type="text" ';
    }

    echo 'name="parameter['.($i-1).']" placeholder="'.$attr[$i].' of '.ucfirst($model->__get("class")).'"/><br>';
}
?>
<br>
<input type="text" name="action" value="<?php echo  $action;?>" style="display: none;"/>
<input type="text" name="entity" value="<?php echo $entity;?>" style="display: none;"/>
<button name="<?php echo  $action;?>" type="submit" value="<?php echo  $action;?>" ><?php echo ucfirst($action);?></button>
</form>