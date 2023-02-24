<?php
 include('Base de Datos/Conexion/conexion.php');

 $fechahora = date('y-m-d h:i:s');
 $SQL="INSERT INTO `ordenes` (`OrdenID`, `ClienteID`, `FechaHoraOrden`) VALUES (NULL, '1', '$fechahora');";
 $ID ="SELECT `OrdenID` from ordenes order by OrdenID DESC LIMIT 1";
 $ResNO=$Conexion->query($SQL);
 $ResID=$Conexion->query($ID);

 //echo $idP= $ResNO->OrdenID;
 /*if ($ResNO==1) {
    $Row_ID = $ResID->fetch_array();
    echo "<script>
        document.location = 'GenerarVenta.php?idp=".$Row_ID['OrdenID']."';
        </script>";
 }*/
?>