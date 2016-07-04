<form action='index.php' method="POST">
<?php
/**
 * General Delete View
 */
echo '<h3>'.  ucfirst($model->__get("class")).'</h3>';
echo '<h3>Enter Data</h3>';
$attr=$model->__get("cols");
for($i=1;$i<count($attr);$i++)
{
    echo $attr[$i];
    echo '<br><input ';
    echo 'type="text" ';
    echo 'name="parameter['.($i-1).']" placeholder="'.$attr[$i].' of '.ucfirst($attribute).'"/><br>';
}
?>
<br>
<input type="text" name="func" value="<?php echo  $op;?>" style="display: none;"/>
<input type="text" name="class" value="<?php echo $attribute;?>" style="display: none;"/>
<button name="<?php echo  $op;?>" type="submit" value="<?php echo  $op;?>" ><?php echo ucfirst($op);?></button>
</form>