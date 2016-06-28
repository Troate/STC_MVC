<?php
/**
 * General List View
 */

$attr=$model->getCols();
echo '<table><tr>';
for(;$i<count($attr);$i++)
{
    echo'<th style="min-width:100px ">'.$attr[$i].'</th>';
}
echo '</tr>';
foreach($model_array as $m)
{
    echo '<tr>';
    for($i=1;$i<count($attr);$i++)
    {
        $get='get'.$attr[$i];
        echo '<td style="text-align:center">'.$m->$get().'</td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
