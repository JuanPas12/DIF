<?php
include('Base de Datos/Conexion/conexion.php');
  $nombre=$_POST['txtNombre'];
  $direccion=$_POST['txtDireccion'];
  $telefono=$_POST['txtTelefono'];
  $claveA = $_POST['txtClaveA'];
  
  $SQL="UPDATE `clientes` SET `Nombre` = '$nombre', `Direccion` = '$direccion', `Telefono` = '$telefono' WHERE `clientes`.`ClienteID` = $claveA;";
  $Res=$Conexion->query($SQL);
  if ($Res==1) {
  	echo "<script>
			alert('Se actualizo el cliente $claveA con exito');
			document.location = 'Clientes.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
 }
?>