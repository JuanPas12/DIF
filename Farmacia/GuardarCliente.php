<?php
include('Base de Datos/Conexion/conexion.php');
  $nombre=$_POST['txtNombre'];
  $direccion=$_POST['txtDireccion'];
  $telefono=$_POST['txtTelefono'];
  
  $SQL="INSERT INTO `clientes` (`ClienteID`, `Nombre`, `Direccion`, `Telefono`) VALUES (NULL, '$nombre', '$direccion', '$telefono');";
  $Res=$Conexion->query($SQL);
  if ($Res==1) {
  	echo "<script>
			alert('Se guardo el cliente $nombre con exito');
			document.location = 'InsertarCliente.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
 }
?>