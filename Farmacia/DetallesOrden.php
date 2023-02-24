<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Ventas | DIF Tangancicuaro
    </TITLE>
    <LINK rel="stylesheet" href="css/estilos.css">
    <LINK rel="icon" href="imagenes/Logo_DIF.png">
</HEAD>
<?php 
    $orden = $_GET['id'];
?>
<BODY>

    <HEADER class="header">
        <DIV class="container">
            <BR>
            <DIV class="logo">
                <a href="index.php"><IMG src="imagenes/Logo_DIF.png" style="width: 170px"></a>
            </DIV>
            <NAV class="menu">
                    <a href="index.php">
                        <IMG src="imagenes/home.png" style="width: 13px"> INICIO
                    </a>
                    <a href="Clientes.php">
                        <IMG src="imagenes/cliente.png" style="width: 13px"> CLIENTE
                    </a>
                    <a href="Proveedores.php">
                        <IMG src="imagenes/proveedor.png" style="width: 13px"> PROVEEDORES
                    </a>
                    <a href="NuevaOrden.php">
                        <IMG src="imagenes/venta.png" style="width: 13px"> NUEVA VENTA
                    </a>
                    <a href="Inventario.php">
                        <IMG src="imagenes/almacen.png" style="width: 13px"> INVENTARIO
                    </a>
        </DIV>
    </HEADER>
    <DIV class="b" style="position: relative; top: 50px; left: 474px; width: 1400px; height: 50px; text-align: right;">
        <a href="Ventas.php"><INPUT type="button" class="button button1" value="Todas las Ventas"></a>
</DIV>
    <DIV class="Prods" style="position: relative; top: 50px; left: 65px; width: 1400px;">
        <br>
            <br><br>
            <table style="width: 1400px">
                <tr>
                    <th>
                        ID Producto
                    </th>
                    <th>
                        Nombre Producto
                    </th>
                    <th>
                        Precio Unitario
                    </th>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Descuento
                    </th>
                    <th>
                        Estado
                    </th>
                </tr>
                <?php
            include('Base de Datos/Conexion/conexion.php');
			$SQL="SELECT * FROM detalles_orden DOR INNER JOIN productos P ON DOR.ProductoID = P.ProductoID WHERE `OrdenID` = $orden";
			$ResC=$Conexion->query($SQL);
			while($Fila=$ResC->fetch_array()){
                    echo"<tr>
                            <td style = 'text-align: center;'>".$Fila['ProductoID']."</td>
                            <td style = 'text-align: center;'>".$Fila['NombreProducto']."</td>
                            <td style = 'text-align: center;'>".$Fila['PrecioUnitario']."</td>
                            <td style = 'text-align: center;'>".$Fila['Cantidad']."</td>
                            <td style = 'text-align: center;'>".$Fila['Descuento']."%</td>
                            <td style = 'text-align: center;'>".$Fila['Estado']."</td>
                        </tr>";
                }
            ?>
            <a href=""></a>
            </table>
        <br>
        <br>
    </DIV>
</BODY>
>

</html>