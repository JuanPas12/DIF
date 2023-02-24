<?php
include('Base de Datos/Conexion/conexion.php');
$NoVenta = $_GET['idventa'];
$descuento = $_GET['desc'];
$total = $_GET['total'];
$cliente = $_POST['cmbCliente'];

$SQL = "SELECT * FROM `detalles_orden` WHERE `OrdenID` = $NoVenta AND Estado = 'P'";
$ResProd=$Conexion->query($SQL);
while($Fila=$ResProd->fetch_array()){
    $CodigoB = $Fila['ProductoID'];
    $Cantidad = $Fila['Cantidad'];
    $SQL = "UPDATE `productos` SET `UnidadesStock` = UnidadesStock-$Cantidad WHERE `productos`.`ProductoID` = '$CodigoB';";
    $ResVenta=$Conexion->query($SQL);
}
$SQLB = "UPDATE `detalles_orden` SET `Descuento` = '$descuento', `Estado` = 'T' WHERE `detalles_orden`.`OrdenID` = $NoVenta;";
echo $SQLT = "UPDATE `ordenes` SET `Monto` = '$total', `ClienteID` = '$cliente' WHERE `ordenes`.`OrdenID` = $NoVenta;";
$ResBandera=$Conexion->query($SQLB);
$ResT=$Conexion->query($SQLT);
/*
echo "<script>
        document.location = 'index.php';
        </script>";*/
?>