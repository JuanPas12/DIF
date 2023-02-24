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

  $codigo_int = intval($codigo);
  $precio_float = floatval($precio);
  $stock_int = intval($stock);
  $stock_min_int = intval($stock_min);
  $stock_max_int = intval ($stock_max);

  if ($stock_min_int > $stock_max_int){
    echo "<script>
			alert('El Stock Minimo no puede ser mayor al Stock Maximo');
			window.history.back();
		</script>";
  }else{
  
  echo $SQL="INSERT INTO `productos` (`ProductoID`, `NombreProducto`, `ProveedorID`, `CategoriaID`, `Compuestos`, `CantidadPorUnidad`, `PrecioUnidad`, `UnidadesStock`, `StockMaximo`, `StockMinimo`) 
  VALUES ('$codigo_int', '$nombre', '$proveedor', '$categoria', '$compuestos', '$cxu', '$precio_float', '$stock_int', '$stock_max_int', '$stock_min_int');";
  $ResPro=$Conexion->query($SQL);
  if ($ResPro==1) {
  	echo "<script>
			alert('Se inserto el producto $nombre con exito');
			document.location = 'InsertarProducto.php';
		</script>";
  }
  else{
    echo "<script>
              alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
              window.history.back();
          </script>";
 }
}
?>