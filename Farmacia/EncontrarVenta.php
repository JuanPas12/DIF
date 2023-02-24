<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Ventas | DIF Tangancicuaro
    </TITLE>
    <LINK rel="stylesheet" href="css/estilos.css">
    <LINK rel="icon" href="imagenes/Logo_DIF.png">
</HEAD>

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
        <form action="EncontrarVenta.php" method="POST">
            &nbsp;<input type="text" name="busqueda" style="width: 210px; font-size: 20px; border-radius: 5px;"><br>
            <input type="submit" name="enviar" value="Buscar Venta&nbsp;🔍︎" class="button button1"
                style="border-radius: 5px;">
            <br><br>
            <table>
            <tr>
                    <th>
                        ID Orden
                    </th>
                    <th>
                        ID Cliente 
                    </th>
                    <th>
                        Cliente 
                    </th>
                    <th>
                        Fecha Y Hora
                    </th>
                    <th>
                        Monto
                    </th>
                </tr>
                <?php
            include('Base de Datos/Conexion/conexion.php');
            $CP=$_POST['busqueda'];
            $SQL="SELECT * FROM ordenes O INNER JOIN clientes C ON O.ClienteID = C.ClienteID WHERE `OrdenID` LIKE '$CP' OR `Nombre` LIKE '$CP%' OR O.ClienteID LIKE '$CP' ORDER BY `O`.`FechaHoraOrden` DESC";
            $ResC=$Conexion->query($SQL);
            $Tam=$ResC->num_rows;
            if($Tam>0){ 
			while($Fila=$ResC->fetch_array()){
                echo"<tr>
                        <td style = 'text-align: center;'><a style='color: black' href='DetallesOrden.php?id=".$Fila['OrdenID']."'>".$Fila['OrdenID']."</a></td>
                        <td style = 'text-align: center;'>".$Fila['ClienteID']."</a></td>
                        <td style = 'text-align: center;'>".$Fila['Nombre']."</a></td>
                        <td style = 'text-align: center;'>".$Fila['FechaHoraOrden']."</td>
                        <td style = 'text-align: center;'>$ ".$Fila['Monto']."</td>
                    </tr>";
                }while($Fila=$ResC->fetch_array())
            ?>
            </table>
        </form>
        <br>
        <br>
    </DIV>
</BODY>
<?php
		}else{
			echo "No existen registros";
		}
?>

</html>