<?php
/**
 * Generic Update View
 */
$attr=$model->getCols();
echo '<h3>Enter Old Data</h3>';
for($j=count($attr);$i<count($attr);$j++,$i++)
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
    echo 'name="parameter['.($j-1).']" placeholder="Old '.$attr[$i].' of '.ucfirst($field).'"/><br>';
}

echo '<h3>Enter New Data</h3>';
for($i=1;$i<count($attr);$i++)
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
    echo 'name="parameter['.($i-1).']" placeholder="New '.$attr[$i].' of '.ucfirst($field).'"/><br>';
}

    
?>
<br>
<input type="text" name="func" value="<?php echo  $op;?>" style="display: none;"/>
<input type="text" name="class" value="<?php echo $field;?>" style="display: none;"/>
