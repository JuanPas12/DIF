<?php
include('Base de Datos/Conexion/conexion.php');
  $nombre=$_POST['txtNombre'];
  $direccion=$_POST['txtDireccion'];
  $telefono=$_POST['txtTelefono'];
  $correo=$_POST['txtCorreo'];
  
  $SQL="INSERT INTO `proveedores` (`ProveedorID`, `NombreProveedor`, `Direccion`, `Telefono`, `Correo`) VALUES (NULL, '$nombre', '$direccion', '$telefono', '$correo');";
  $Res=$Conexion->query($SQL);
  if ($Res==1) {
  	echo "<script>
			alert('Se guardo el proveedor $nombre con exito');
			document.location = 'ProveedorCliente.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
 }
?>