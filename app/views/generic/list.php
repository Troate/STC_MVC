<form action="index.php" method="POST">
<?php
/**
 * General List View
 */
echo '<h3>'.  ucfirst($model->__get("class")).'</h3>';
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
    <button type="submit">Done</button>
</form>
