<?php
include('Base de Datos/Conexion/conexion.php');
$codigo = $_POST['txtCodigoBarras'];
  $nombre=$_POST['txtNombre'];
  $proveedor=$_POST['cmbProveedor'];
  $categoria=$_POST['cmbCategoria'];
  $compuestos=$_POST['txtCompuestos'];
  $cxu=$_POST['txtCXU'];
  $precio=$_POST['txtPrecio'];
  $stock=$_POST['txtStock'];
  $stock_min=$_POST['txtStockMin'];
  $stock_max=$_POST['txtStockMax'];
  $claveA = $_POST['txtClaveA'];

  $claveA_int = intval($claveA);
  $codigo_int = intval($codigo);
  $precio_float = floatval($precio);
  $stock_int = intval($stock);
  $stock_min_int = intval($stock_min);
  $stock_max_int = intval ($stock_max);
  
  $SQL="UPDATE `productos` SET `ProductoID` = '$codigo_int', `NombreProducto` = '$nombre', `ProveedorID` = '$proveedor', 
  `CategoriaID` = '$categoria', `Compuestos` = '$compuestos', `CantidadPorUnidad` = '$cxu', `PrecioUnidad` = '$precio_float',
   `UnidadesStock` = '$stock_int', `StockMaximo` = '$stock_max_int', `StockMinimo` = '$stock_min_int' WHERE `productos`.`ProductoID` = '$claveA_int';";
  $ResPro=$Conexion->query($SQL);
  if ($ResPro==1) {
  	echo "<script>
			alert('Se actualizo el producto $nombre con exito');
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