<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Clientes | DIF Tangancicuaro
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
                    <a href="Inventario.php">
                        <IMG src="imagenes/almacen.png" style="width: 13px"> INVENTARIO
                    </a>
                    <a href="Proveedores.php">
                        <IMG src="imagenes/proveedor.png" style="width: 13px"> PROVEEDORES
                    </a>
                    <a href="NuevaOrden.php">
                        <IMG src="imagenes/venta.png" style="width: 13px"> NUEVA VENTA
                    </a>
        </DIV>
    </HEADER>
    <DIV class="b" style="position: relative; top: 50px; left: 474px; width: 1400px; height: 50px; text-align: right;">
        <a href="InsertarCliente.php"><INPUT type="button" class="button button1" value="Agregar Un Cliente&nbsp;+"></a>
    </DIV>
    <DIV class="Prods" style="position: relative; top: 50px; left: 65px; width: 1400px;">
        <br>
        <form action="EncontrarCliente.php" method="POST">
            &nbsp;<input type="text" name="busqueda" required style="width: 210px; font-size: 20px; border-radius: 5px;"><br>
            <input type="submit" name="enviar" value="Buscar Cliente&nbsp;🔍︎" class="button button1"
                style="border-radius: 5px;">
            <br><br>
            <table style="width: 1400px">
                <tr>
                    <th>
                        ID Cliente
                    </th>
                    <th>
                        Nombre 
                    </th>
                    <th>
                        Dirección
                    </th>
                    <th>
                        Teléfono
                    </th>
                    <th>
                        Modificar
                    </th>
                    <th>
                        Eliminar
                    </th>
                </tr>
                <?php
            include('Base de Datos/Conexion/conexion.php');
			$SQL="SELECT * FROM `clientes` ORDER BY `clientes`.`ClienteID` ASC";
			$ResC=$Conexion->query($SQL);
			while($Fila=$ResC->fetch_array()){
                    echo"<tr>
                            <td style = 'text-align: center;'>".$Fila['ClienteID']."</td>
                            <td style = 'text-align: center;'>".$Fila['Nombre']."</td>
                            <td style = 'text-align: center;'>".$Fila['Direccion']."</td>
                            <td style = 'text-align: center;'>".$Fila['Telefono']."</td>
                            <td style = 'text-align: center;'><a href='EditarCliente.php?clave=".$Fila['ClienteID']."'><img src='imagenes/editing.png' width = 15></a></td>
                            <td style = 'text-align: center;'><a href='EliminarCliente.php?clave=".$Fila['ClienteID']."'><img src='imagenes/close.png' width = 15></a></td>
                        </tr>";
                }
            ?>
            <a href=""></a>
            </table>
        </form>
        <br>
        <br>
    </DIV>
</BODY>
>

</html>