<?php
include('Base de Datos/Conexion/conexion.php');
  $nombre=$_POST['txtNombre'];
  $direccion=$_POST['txtDireccion'];
  $telefono=$_POST['txtTelefono'];
  $correo=$_POST['txtCorreo'];
  $claveA = $_POST['txtClaveA'];
  
  $SQL="UPDATE `proveedores` SET `NombreProveedor` = '$nombre', 
  `Direccion` = '$direccion', `Telefono` = '$telefono', `Correo` = '$correo' WHERE `proveedores`.`ProveedorID` = $claveA;";
  $Res=$Conexion->query($SQL);
  if ($Res==1) {
  	echo "<script>
			alert('Se actualizo el proveedor $claveA con exito');
			document.location = 'Proveedores.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
 }
?>