<?php
    include('Base de Datos/Conexion/conexion.php');
    $codigo = $_POST['txtCodB'];
    $orden= $_POST['txtNoOrden'];
    $SQL="SELECT * FROM `detalles_orden` WHERE `ProductoID` = $codigo AND `Estado` != 'T'";
    $ResPro=$Conexion->query($SQL);
    $Tam = $ResPro->num_rows;
    /*Validar si esta en stock y si no mandar un mensaje*/
    if ($Tam > 0){
        $Fila = $ResPro->fetch_array();
        $cantidad = $Fila['Cantidad'];
        $cantidad += 1;
        $SQL = "UPDATE `detalles_orden` SET `Cantidad` = '$cantidad' WHERE `detalles_orden`.`ProductoID` = $codigo;";
    } else{
        echo $SQL2 = "SELECT ProductoID, PrecioUnidad FROM productos WHERE `ProductoID` = $codigo;";
        $ResSQL2=$Conexion->query($SQL2);
        $Row = $ResSQL2->fetch_array();
        $idp = $Row['ProductoID'];
        $precio = $Row['PrecioUnidad'];
        echo $SQL3 = "INSERT INTO `detalles_orden` (`OrdenID`, `ProductoID`, `PrecioUnitario`) VALUES ('$orden', '$idp', '$precio');";
        $ResSQL3=$Conexion->query($SQL3);
    }
    $ResVen=$Conexion->query($SQL);

if ($ResVen==1) {
    echo "<script>
        document.location = 'GenerarVenta.php?idp=$orden';
        </script>";
    }else{
        echo "<script>
        alert('Hubo algun error al momento de procesar su petición, favor de verificar los datos');
        window.history.back();
        </script>";
    }
?>