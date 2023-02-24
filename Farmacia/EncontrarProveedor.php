<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Proveedores | DIF Tangancicuaro
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
                    <a href="NuevaOrden.php">
                        <IMG src="imagenes/venta.png" style="width: 13px"> NUEVA VENTA
                    </a>
                    <a href="Inventario.php">
                        <IMG src="imagenes/almacen.png" style="width: 13px"> INVENTARIO
                    </a>
        </DIV>
    </HEADER>
    <DIV class="b" style="position: relative; top: 50px; left: 474px; width: 1400px; height: 50px; text-align: right;">
        <a href="Proveedores.php"><INPUT type="button" class="button button1" value="Todos los Proveedores"></a>
        <a href="InsertarProveedor.php"><INPUT type="button" class="button button1" value="Agregar Un Proveedor&nbsp;+"></a>
    </DIV>
    <DIV class="capa"></DIV>
    <DIV class="Prods" style="position: relative; top: 50px; left: 65px; width: 1400px;">
        <br>
        <form action="EncontrarProveedor.php" method="POST">
            &nbsp;<input type="text" name="busqueda" style="width: 210px; font-size: 20px; border-radius: 5px;"><br>
            <input type="submit" name="enviar" value="Buscar Cliente&nbsp;🔍︎" class="button button1"
                style="border-radius: 5px;">
            <br><br>
            <table>
            <tr>
                    <th>
                        ID Proveedor
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
                        Correo
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
            $CP=$_POST['busqueda'];
            $SQL="SELECT * FROM `proveedores` WHERE `ProveedorID` LIKE '%$CP%' OR `NombreProveedor` LIKE '$CP%'  ORDER BY `proveedores`.`ProveedorID` ASC";
            $ResP=$Conexion->query($SQL);
            $Tam=$ResP->num_rows;
            if($Tam>0){ 
			while($Fila=$ResP->fetch_array()){
                    echo"<tr>
                            <td style = 'text-align: center;'>".$Fila['ProveedorID']."</td>
                            <td style = 'text-align: center;'>".$Fila['NombreProveedor']."</td>
                            <td style = 'text-align: center;'>".$Fila['Direccion']."</td>
                            <td style = 'text-align: center;'>".$Fila['Telefono']."</td>
                            <td style = 'text-align: center;'>".$Fila['Correo']."</td>
                            <td style = 'text-align: center;'><a href='EditarProveedor.php?clave=".$Fila['ProveedorID']."'><img src='imagenes/editing.png' width = 15></a></td>
                            <td style = 'text-align: center;'><a href='EliminarProveedor.php?clave=".$Fila['ProveedorID']."'><img src='imagenes/close.png' width = 15></a></td>
                        </tr>";
                }while($Fila=$ResP->fetch_array())
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