<form action="index.php" method="POST">
<?php
/**
 * General List View
 */
echo '<h3>'.  ucfirst($model->__get("class")).'</h3>';
$attr=$mod;

echo 'Select Columns:<br>';
for($i=0;$i<count($attr);$i++)
{
    echo '<input type="checkbox" name="parameter[select][]" value="'.$attr[$i].'">'.$attr[$i].'<br>';
}
$num=$model->__get("numeric");
echo '<br>Where :<br>';
for($i=0;$i<count($attr);$i++)
{
    echo $attr[$i].'<br>';
    echo '<input ';
    if(in_array($attr[$i], $num))
    {
        echo 'type="number" min="0" ';
    }
    else
    {
        echo 'type="text" ';
    }
    echo 'name="parameter[where]['.$attr[$i].']" ><br><br>';
}
?>
    <input type="text" name="entity" value="<?php echo $entity; ?>" style="display: none;"/>
    <input type="text" name="action" value="read" style="display: none;"/>
    <button type="submit" value="select" name="select">Read</button>
    <br>
    <br>
<?php
/**
 * General List View
 */
$attr=$model->__get("cols");
echo '<table><tr>';
for($i=0;$i<count($attr);$i++)
{
    echo'<th style="min-width:100px ">'.$attr[$i].'</th>';
}
echo '</tr>';
foreach($model_array as $m)
{
    echo '<tr>';
    for($i=0;$i<count($attr);$i++)
    {
        echo '<td style="text-align:center">'.$m->__get(lcfirst($attr[$i])).'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
    <br>
    <a href="index.php">Main Page</a><br>
</form>
