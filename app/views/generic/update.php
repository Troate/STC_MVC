<form action='index.php' method="POST">
<?php
/**
 * General Update View
 */
echo '<h3>'.  ucfirst($parameter['model']->__get("class")).'</h3>';
$attr=$parameter['model']->__get("cols");
$num=$parameter['model']->__get("numeric");
echo '<h3>Enter Old Data</h3>';
for($j=count($attr),$i=1;$i<count($attr);$j++,$i++)
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

    echo 'name="parameter['.($j-1).']" placeholder="Old '.$attr[$i].' of '.ucfirst($parameter['model']->__get("class")).'"/><br>';
}

echo '<h3>Enter New Data</h3>';
for($i=1;$i<count($attr);$i++)
{
    echo $attr[$i];
    echo '<br><input ';
    $get='get'.$attr[$i];
    if(array_search($attr[$i], $num))
    {
        echo 'type="number" min="0" ';
    }
    else
    {
        echo 'type="text" ';
    }

    echo 'name="parameter['.($i-1).']" placeholder="New '.$attr[$i].' of '.ucfirst($parameter['model']->__get("class")).'"/><br>';
}

    
?>
<br>
<input type="text" name="action" value="<?php echo  $parameter['action'];?>" style="display: none;"/>
<input type="text" name="entity" value="<?php echo $parameter['entity'];?>" style="display: none;"/>

<button name="<?php echo  $parameter['action'];?>" type="submit" value="<?php echo  $parameter['action'];?>" ><?php echo ucfirst($parameter['action']);?></button>
</form>