<?php

//Tabla vacas 
$num = 1;
if(sizeof($vacas)>0) {
    foreach($vacas as $object) {
        //echo "<tr>";
        if($num % 2 != 0) { 
            echo '<td class="left_35 style_content_bg">'.$object->nombre.'</td>';
            echo '<td class="center_30 style_content">'.floatval($object->lat).'</td>';
            echo '<td class="right_35 style_content_bg">'.floatval($object->lng).'</td>';
            $num++;
        } else {
            echo '<td class="left_35 style_content">'.$object->nombre.'</td>';
            echo '<td class="center_30 style_content_bg">'.floatval($object->lat).'</td>';
            echo '<td class="right_35 style_content">'.floatval($object->lng).'</td>';
            $num++;
        }
        echo "</tr>";
    }
}
?>