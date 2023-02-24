<?php
include('Base de Datos/Conexion/conexion.php');
  $clave_Pro=$_GET['clave'];

  echo "<script>
  var resultado = window.confirm('¿Estas seguro que deseas eliminar el producto ".$clave_Pro."? Recuerda que no se podra recuperar la información');
  if (resultado === true) {
      window.alert('Confirmado, borrando información');
    } else {
        window.alert('Cancelando petición');
        window.history.back();
    }
    </script>";

  $SQL="DELETE FROM `productos` WHERE `productos`.`ProductoID` = '$clave_Pro'";
  $ResPro=$Conexion->query($SQL);

  if ($ResPro==1) {
  	echo "<script>
			alert('Se elimino el producto $clave_Pro con exito');
			document.location = 'Inventario.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
}
?>