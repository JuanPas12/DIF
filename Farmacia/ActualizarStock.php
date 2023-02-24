<?php
include('Base de Datos/Conexion/conexion.php');
  $clave_Pro=$_POST['txtClave'];
  $stockA = $_POST ['txtStockA'];
  $stockN = $_POST['txtStockN'];

  $clave_int = intval($clave_Pro);
  $stockN_int = intval($stockN);
  $stockA_int = intval($stockA);

  $stockT = $stockA_int + $stockN_int;

  echo $stockT;
  
  $SQL="UPDATE `productos` SET `UnidadesStock` = '$stockT' WHERE `productos`.`ProductoID` = '$clave_int';";
  $ResPro=$Conexion->query($SQL);
  if ($ResPro==1) {
  	echo "<script>
			alert('Se agregaron $stockN unidades con exito');
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
  