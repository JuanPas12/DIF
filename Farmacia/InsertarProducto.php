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
    <DIV class="capa"></DIV>
    <DIV class="PuntoVenta">
        <br>
        <form action="GuardarProducto.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <td colspan="3" style="text-align: center">
                            <text style="font-size: 20px">
                                <bold>
                                    REGISTRAR UN NUEVO PRODUCTO
                                </bold>
                            </text>
                        </td>
                    </tr>
                </thead>
                <tr>
                    <th> ID Producto<br><br><input type="text" name="txtCodigoBarras" required maxlength="13"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Nombre del Producto<br><br><input type="text" name="txtNombre" required
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Proveedor<br><br><select style="font-size: 18px;" name="cmbProveedor">
                            <?php
                            include('Base de Datos/Conexion/conexion.php');
                            $SQL="SELECT * FROM `proveedores`";
                            $ResClientes=$Conexion->query($SQL);
                            while($Fila=$ResClientes->fetch_array()){
                            echo "<option value=".$Fila ['ProveedorID']."> ".$Fila['NombreProveedor']."</option>"."<br>";
                                }
                            ?>
                            </select></th>
                </tr>
                <tr>

                    <th> Categoria<br><br><select style="font-size: 18px;" name="cmbCategoria">
                            <?php
                            include('Base de Datos/Conexion/conexion.php');
                            $SQL="SELECT * FROM `categorias`";
                            $ResClientes=$Conexion->query($SQL);
                            while($Fila=$ResClientes->fetch_array()){
                            echo "<option value=".$Fila ['CategoriaID']."> ".$Fila['NombreCategoria']."</option>"."<br>";
                                }
                            ?>
                            </select></th>
                    <th> Compuestos<br><br><input type="text" name="txtCompuestos" required
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Cantidad por Unidad<br><br><input type="text" name="txtCXU" required
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                </tr>
                <tr>
                    <th> Precio por Unidad<br><br><input type="text" name="txtPrecio" step="0.01" required
                            style="width: 50px; font-size: 18px; border-radius: 5px;"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Existencias<br><br><input type="text" name="txtStock" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Existencias Minimas<br><br><input type="text" name="txtStockMin" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                </tr>
                <tr>
                <th> Existencias Maximas<br><br><input type="text" name="txtStockMax" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;" name="enviar">
                        <INPUT type="submit" class="button button1"
                                value="Guardar"></a></button>
                    </th>
                </tr>
            </table>

        </form>
        <br>
        <br>
    </DIV>
</BODY>

</html>