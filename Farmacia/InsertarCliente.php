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
        <form action="GuardarCliente.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <td colspan="3" style="text-align: center">
                            <text style="font-size: 20px">
                                <bold>
                                    REGISTRAR UN NUEVO CLIENTE
                                </bold>
                            </text>
                        </td>
                    </tr>
                </thead>
                <tr>
                    <th> Nombre del Cliente<br><br><input type="text" name="txtNombre" required maxlength="30"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Dirección<br><br><input type="text" name="txtDireccion" required maxlength="60"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"></th>
                    <th> Numero de Teléfono<br><br><input type="text" name="txtTelefono" required maxlength="10"
                            style="width: 200px; font-size: 18px; border-radius: 5px;"
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