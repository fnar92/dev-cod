<?php
//Tabla puntos del limite 
$num = 1;
if(sizeof($puntos)>0) {
    foreach($puntos as $object) {
        echo "<tr>";
        echo '<td class="text-left">'.$num.'</td>';
        echo '<td class="text-left">'.floatval($object->latitud).'</td>';
        echo '<td class="text-left">'.floatval($object->longitud).'</td>';
        echo '<td class="text-center"><a href="';
        echo site_url("Eliminar/".$object->id_limite);
        echo '" type="button" class="btn btn-default">Eliminar</a></td>';
        echo "</tr>";
        $num = $num + 1;
    }
}
?>