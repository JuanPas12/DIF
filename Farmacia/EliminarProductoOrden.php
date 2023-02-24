<?php
include('Base de Datos/Conexion/conexion.php');
  $clave_Pro=$_GET['prod'];
  $orden=$_GET['orden'];

  $SQL="DELETE FROM `detalles_orden` WHERE `detalles_orden`.`ProductoID` = '$clave_Pro' AND `detalles_orden`.`OrdenID` = '$orden'";
  $ResPro=$Conexion->query($SQL);

  if ($ResPro==1) {
  	echo "<script>
			document.location = 'GenerarVenta.php?idp=".$orden."';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
}
?>