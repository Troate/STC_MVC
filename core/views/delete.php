<?php
/**
 * General Delete View
 */

echo '<h3>Enter Data</h3>';
$attr=$model->getCols();
for(;$i<count($attr);$i++)
{
    echo $attr[$i];
    echo '<br><input ';
    $get='get'.$attr[$i];
    if(gettype($model->$get())=='integer')
    {
        echo 'type="number" min="0" ';
    }
    else 
    {
        echo 'type="text" ';
    }
    echo 'name="parameter['.($i-1).']" placeholder="'.$attr[$i].' of '.ucfirst($field).'"/><br>';
}
?>
<br>
<input type="text" name="func" value="<?php echo  $op;?>" style="display: none;"/>
<input type="text" name="class" value="<?php echo $field;?>" style="display: none;"/>