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
        </DIV>
    </HEADER>
    <DIV class="capa"></DIV>
    <DIV class="Prods" style="position: relative; top: 100px; left: 1px; width: 1400px;display:flex; justify-content: center">
        <br>
        <form action="ActualizarStock.php" method="POST">
            <text style="font-size:25px">¿Cuantas unidades desea agregar para el producto
                <strong><?php echo $Fila['NombreProducto'];?></strong>?</text>
            <input type="text" name="txtStockN" required style="width: 50px; font-size: 18px; border-radius: 5px;"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                <br><br>
            <input type = "hidden" value = "<?php echo $Fila['UnidadesStock'];?>" name = "txtStockA">
            <input type = "hidden" value = "<?php echo $Fila['ProductoID'];?>" name = "txtClave">
            <INPUT type="submit" class="button button1" value="Agregar Unidades +"></a></button></th>
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