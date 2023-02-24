<HTML lang="es">

<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Productos | DIF Tangancicuaro
    </TITLE>
    <LINK rel="stylesheet" href="css/estilos.css">
    <LINK rel="icon" href="imagenes/Logo_DIF.png">
</HEAD>
<?php
    include('Base de Datos/Conexion/conexion.php');
      $CP=$_GET['clave'];
      $SQL="SELECT * FROM `productos` WHERE `ProductoID` = $CP";
        $ResPro=$Conexion->query($SQL);
		$Tam=$ResPro->num_rows;
		if($Tam>0){ 
        $Fila=$ResPro->fetch_array();
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
    <DIV class="capa"></DIV>
    <DIV class="PuntoVenta">
        <br>
        <form action="ActualizarProducto.php" method="POST">
            <h3>
                Editar Producto

            </h3>
            <table>
            <tr>
                    <th> ID Producto<br><br><input type="text" name="txtCodigoBarras" required maxlength="13"
                            style="width: 200px; font-size: 18px; border-radius: 5px;" value="<?php echo $Fila['ProductoID'];?>"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Nombre del Producto<br><br><input type="text" name="txtNombre" required value="<?php echo $Fila['NombreProducto'];?>"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Proveedor<br><br><select style="font-size: 18px;" name="cmbProveedor">
                            <?php
                            $AnteriorP=$Fila['ProveedorID'];
                            include('Base de Datos/Conexion/conexion.php');
                            $SQLP="SELECT * FROM `proveedores`";
                            $ResPro=$Conexion->query($SQLP);
                            while($FilaP=$ResPro->fetch_array()){
                                echo "<option value=".$FilaP ['ProveedorID'];
                                if ($AnteriorP==$FilaP ['ProveedorID']) {
                                    echo " selected";
                                }
                                echo " > ".$FilaP['NombreProveedor']."</option>";
                            }
                            ?>
                            </select></th>
                </tr>
                <tr>

                    <th> Categoria<br><br><select style="font-size: 18px;" name="cmbCategoria">
                            <?php
                            $AnteriorC=$Fila['CategoriaID'];
                            include('Base de Datos/Conexion/conexion.php');
                            $SQLC="SELECT * FROM `categorias`";
                            $ResCat=$Conexion->query($SQLC);
                            while($FilaC=$ResCat->fetch_array()){
                                echo "<option value=".$FilaC ['CategoriaID'];
                                if ($AnteriorC==$FilaC ['CategoriaID']) {
                                    echo " selected";
                                }
                                echo " > ".$FilaC['NombreCategoria']."</option>";
                                }
                            ?>
                            </select></th>
                    <th> Compuestos<br><br><input type="text" name="txtCompuestos" required value="<?php echo $Fila['Compuestos'];?>"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Cantidad por Unidad<br><br><input type="text" name="txtCXU" required value="<?php echo $Fila['CantidadPorUnidad'];?>"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                </tr>
                <tr>
                    <th> Precio por Unidad<br><br><input type="text" name="txtPrecio" step="0.01" required
                            style="width: 50px; font-size: 18px; border-radius: 5px;" value="<?php echo $Fila['PrecioUnidad'];?>"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Existencias<br><br><input type="text" name="txtStock" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;" value="<?php echo $Fila['UnidadesStock'];?>"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                    <th> Existencias Minimas<br><br><input type="text" name="txtStockMin" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;" value="<?php echo $Fila['StockMinimo'];?>"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                </tr>
                <tr>
                <th> Existencias Maximas<br><br><input type="text" name="txtStockMax" required maxlength="13"
                            style="width: 50px; font-size: 18px; border-radius: 5px;" value="<?php echo $Fila['StockMaximo'];?>"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></th>
                </tr>
                <input type="hidden" value="<?php echo $Fila['ProductoID'];?>" name="txtClaveA">
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 20px;" name="enviar"><INPUT type="submit"
                            class="button button1" value="Guardar"></a></button></th>
                </tr>
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