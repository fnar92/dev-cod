<?php
   $host = "localhost";
  $user = "codiga_n";
  $pass = "codiga_n";
  $port = "3306";
  $db = "codiga_n";
  
$connection = mysqli_connect($host, $user, $pass, $db, $port);

if(!$connection)
{
    die("Database server connection failed.");  
}
else
{
    $dbconnect = mysqli_select_db($connection, $db);

    if(!$dbconnect)
    {
        die("Unable to connect to the specified database!");
        echo "Bien";
    }
    else
    {   
      date_default_timezone_set("America/Mexico_City");
      $data = json_decode(file_get_contents('php://input'), true);
           
     echo $data;
     echo json_encode($data);
    
        $temBat = $data["temBat"];
        $tempCow = $data["tempCow"];
        $volBat = $data["volBat"];
        $activity = $data["activity"];
        $lat = $data["lat"];
        $lon = $data["lon"];
        $idUser = $data["idUser"];
        $idCow = $data["idCow"];
        $idDevice =  $data["idDevice"];

        echo $data["temBat"];
      
        $Date = date("Y-m-d H:i:s",time());

        echo $data["temBat"];
        echo json_encode($data);
      
      /*$sqlinsert = "INSERT INTO `geo_posicion`(`id_geo_posicion`, `lat`, `lng`, `temp`, `accel`, `bat_level`, `bat_temp`, `status`, `celo`, `fecha_hora`,`dispositivo_id_dispositivo`, `cabeza_ganado_id_cabeza`, `cabeza_ganado_usuario_id_usuario`) VALUES (Null,'".$lat ."','".$lon."','".$tempCow."','".$activity."','".$volBat ."','".$temBat."','0','0','".$Date."','".$idDevice ."','".$idCow."','".$idUser."')";*/

     /*$sqlinsert = "INSERT INTO `geo_posicion`(`id_geo_posicion`, `lat`, `lng`, `temp`, `accel`, `bat_level`, `bat_temp`, `status`, `celo`, `fecha_hora`, `cabeza_ganado_usuario_id_usuario`, `dispositivo_id_dispositivo`, `cabeza_ganado_usuario_id_usuario1`, `cabeza_ganado_id_cabeza`, `perdido`) VALUES (Null,'".$lat ."','".$lon."','".$tempCow."','".$activity."','".$volBat ."','".$temBat."','0','0','".$Date."',11,1,11,1,0)"; */


 $sqlinsert = " UPDATE `geo_posicion` SET `lat`= floatval($lat), `lng`=floatval($lon) WHERE `cabeza_ganado_id_cabeza` = 1 ";

      $result = mysqli_query($connection, $sqlinsert);
      echo $result;
 
      if ($result == false) {
        echo "Failed";
       echo $data;
       echo json_encode($data);

      }
      else {
        echo "Succes";
      }
    }
}
?>