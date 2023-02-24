<?php
include('Base de Datos/Conexion/conexion.php');
  $orden=$_GET['orden'];

  echo "<script>
  var resultado = window.confirm('¿Estas seguro que deseas cancelar la orden ".$orden."? Recuerda que no se podra recuperar la información');
  if (resultado === true) {
      window.alert('Confirmado, cancelando orden');
    } else {
        window.alert('Cancelando petición');
        window.history.back();
    }
    </script>";

  $SQL="DELETE FROM `ordenes` WHERE `ordenes`.`OrdenID` = '$orden'";
  $ResPro=$Conexion->query($SQL);

  if ($ResPro==1) {
  	echo "<script>
			alert('Se elimino la orden $orden con exito');
			document.location = 'index.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
}
?>