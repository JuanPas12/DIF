<?php
include('Base de Datos/Conexion/conexion.php');
  $orden = $_GET['idorden'];
  $clave_Pro=$_POST['txtClave'];
  $cantidad =$_POST['txtCantidadM'];

  $clave_int = intval($clave_Pro);
  $cantidad_int = intval($cantidad);

  $SQL="UPDATE `detalles_orden` SET `Cantidad` = '$cantidad' WHERE `detalles_orden`.`OrdenID` = $orden AND `detalles_orden`.`ProductoID` = $clave_int; ";
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