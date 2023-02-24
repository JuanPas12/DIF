<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Productos | DIF Tangancicuaro
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
        </DIV>
    </HEADER>
    <DIV class="b" style="position: relative; top: 50px; left: 474px; width: 1400px; height: 50px; text-align: right;">
        <a href="Inventario.php"><INPUT type="button" class="button button1" value="Todos los Productos"></a>
        <a href="InsertarProducto.php"><INPUT type="button" class="button button1" value="Agregar Un Producto&nbsp;+"></a>
    </DIV>
    <DIV class="capa"></DIV>
    <DIV class="Prods" style="position: relative; top: 50px; left: 65px; width: 1400px;">
        <br>
        <form action="Encontra.php" method="POST">
            &nbsp;<input type="text" name="busqueda" style="width: 210px; font-size: 20px; border-radius: 5px;"><br>
            <input type="submit" name="enviar" value="Buscar Producto&nbsp;🔍︎" class="button button1"
                style="border-radius: 5px;">
            <br><br>
            <table>
                <tr>
                <th style="width: 150px;">
                        ID Producto
                    </th>
                    <th style="width: 200px;">
                        Nombre 
                    </th>
                    <th style="width: 150px;">
                        Proveedor
                    </th>
                    <th style="width: 100px;">
                        Categoria
                    </th>
                    <th style="width: 100px;">
                        Compuestos
                    </th>
                    <th style="width: 100px;">
                        Cantidad por Unidad
                    </th>
                    <th style="width: 100px;">
                        Precio Unitario
                    </th>
                    <th style="width: 100px;">
                        Existencias
                    </th>
                    <th style="width: 100px;">
                        Existencias Mínimas
                    </th>
                    <th style="width: 100px;">
                        Existencias Máximas
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
            $SQL="SELECT * FROM productos P INNER JOIN proveedores PR ON P.ProveedorID = PR.ProveedorID INNER JOIN categorias C ON P.CategoriaID = C.CategoriaID WHERE `ProductoID` LIKE '%$CP%' OR `NombreProducto` LIKE '$CP%' ORDER BY `P`.`NombreProducto` ASC";
            $ResPro=$Conexion->query($SQL);
            $Tam=$ResPro->num_rows;
            if($Tam>0){ 
                $Fila=$ResPro->fetch_array();
                do{
                    if ($Fila['UnidadesStock'] < $Fila['StockMinimo']){
                        $color = "color: red;";
                    }else{
                        $color = "color: black;";
                    }
                    echo"<tr>
                    <td style = 'text-align: center;'>".$Fila['ProductoID']."</td>
                    <td style = 'text-align: center;'>".$Fila['NombreProducto']."</td>
                    <td style = 'text-align: center;'>".$Fila['NombreProveedor']."</td>
                    <td style = 'text-align: center;'>".$Fila['NombreCategoria']."</td>
                    <td style = 'text-align: center;'>".$Fila['Compuestos']."</td>
                    <td style = 'text-align: center;'>".$Fila['CantidadPorUnidad']."</td>
                    <td style = 'text-align: center;'>$ ".$Fila['PrecioUnidad']."</td>
                    <td style = 'text-align: center;'><a style='".$color."' href='Editarstock.php?clave=".$Fila['ProductoID']."'>".$Fila['UnidadesStock']."</a></td>
                    <td style = 'text-align: center;'>".$Fila['StockMinimo']."</td>
                    <td style = 'text-align: center;'>".$Fila['StockMaximo']."</td>
                    <td style = 'text-align: center;'><a href='EditarProducto.php?clave=".$Fila['ProductoID']."'><img src='imagenes/editing.png' width = 15></a></td>
                    <td style = 'text-align: center;'><a href='EliminarProducto.php?clave=".$Fila['ProductoID']."'><img src='imagenes/close.png' width = 15></a></td>
                </tr>";
                }while($Fila=$ResPro->fetch_array())
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