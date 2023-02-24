<HTML lang="es">
<HEAD>
    <META charset="UTF-8">
    <TITLE>
        Farmacia | DIF Tangancicuaro
    </TITLE>
    <LINK rel="stylesheet" href="css/estilos.css">
    <LINK rel="icon" href="imagenes/Logo_DIF.png">
</HEAD>

<BODY>
            <?php
            $IDORDEN=$_GET['idp'];
            ?>
    <HEADER class="header">
        <DIV class="container">
            <BR>
            <DIV class="logo">

                    <a href="index.php"><IMG src="imagenes/Logo_DIF.png" style="width: 170px"></a>
                </elemento>
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
                    <a href="Inventario.php">
                        <IMG src="imagenes/almacen.png" style="width: 13px"> INVENTARIO
                    </a>
        </DIV>
    </HEADER>
    <DIV class="b" style="position: relative; top: 50px; left: 474px; width: 1400px; height: 50px; text-align: right;">
        <a href="CancelarOrden.php?orden=<?php echo $IDORDEN ?>"><INPUT type="button" class="button button1" value="Cancelar Orden&nbsp;X"></a>
    </DIV>
    <DIV class="capa"></DIV>
    <DIV class="PuntoVenta">
        <TABLE>
            
            <THEAD>
                <tr></tr>
               
                <form action="CargarOrden.php" method="POST">
                <TR>
                    <td colspan="3" style="text-align: center;">
                            <text name="etqCodP">
                                CODIGO DE BARRAS:
                            </text>
                            <INPUT type="text" name="txtCodB" maxlength="13" style="width: 140px; font-size: 18px"
                                required
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            <input type="hidden" name="txtNoOrden" value="<?php echo $IDORDEN ?>"></input>
                            <br>
                            <INPUT type="submit" class="button button1" style="vertical-align: middle" required
                                value="Cargar">
                    </td>
                </TR>
                </form>
                <TR>
                    <TH> NOMBRE DEL MEDICAMENTO </TH>
                    <TH> CANTIDAD </TH>
                    <TH> PRECIO UNITARIO </TH>
                    <TH style="font-size: 25px"> IMPORTE </TH>
                </TR>
                <THEAD>
                <tbody>
                    <!-- CARGA DE PRODUCTOS -->
                    <?php
                        include('Base de Datos/Conexion/conexion.php');
                        $SQL="SELECT * FROM detalles_orden D INNER JOIN productos P ON D.ProductoID = P.ProductoID WHERE OrdenID = $IDORDEN";
                        $ResProd=$Conexion->query($SQL);
                        $tam = $ResProd -> num_rows;
                        /*if ($tam > 0){
                            $Fila=$ResProd->fetch_array();
                            
                        }*/
                        $total = 0;
                        while($Fila=$ResProd->fetch_array()){

                        $unidades = intval($Fila['Cantidad']);
                        $costo = floatval($Fila['PrecioUnitario']);
                        $importe = $unidades * $costo;
                        $total = $total + $importe;
                        
                            echo"
                                <tr>
                                    <TH scope='row' class='renglon' style='text-align: right'>
                                        ".$Fila['NombreProducto']."
                                        &nbsp;&nbsp;
                                            <a href='EliminarProductoOrden.php?prod=".$Fila['ProductoID']."&orden=".$Fila['OrdenID']."'>
                                                <img src='imagenes/remove.png' style='width: 20px'>
                                            </a>
                                    </TH>
                                    <TD class='renglon' id='cantidad'>
                                        <form action='ActualizarCantidad.php?idorden=".$IDORDEN."' method='POST'>
                                            <INPUT type='text'  value ='".$Fila['Cantidad']."' name='txtCantidadM' maxlength='2' style='width: 25px; font-size: 18px'
                                            requiered
                                            onKeypress='total(); if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;'>
                                            <input type = 'hidden' value = '".$Fila['ProductoID']."' name = 'txtClave'>
                                            <input type='submit' value' ' name='btnCantidad' style='width: 3.5px; height: 3.5px; border: 0.5px'> 
                                            </form>
                                            </TD>
                                    <TD class='renglon' id='costo'>
                                        ".$Fila['PrecioUnitario']."
                                    </TD>
                                    <TD class='renglon' style='text-align: center' id='importe'>
                                        $importe
                                    </TD>
                                </tr>";
                                $NoVenta = $Fila['OrdenID'];
                        }
                        
                    ?>
                    <!-- --------------------- -->
                    <tr>
                        <th scope="row" colspan="3" style="text-align: right;">
                            DESCUENTO:
                        </th>
                        <td colspan="1">
                        <form action='Descuento.php?idorden=<?php echo $IDORDEN ?>&total=<?php echo $total ?>"' method='POST'>
                            <INPUT type="text" name="txtDescuento" maxlength="2" style="width: 27px; font-size: 18px"
                                requiered
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            <input type='submit' value='%' name='btnDescuento' style='width: 35px; height: 35px; border: 0.5px'>
                        </form>
                        </td>
                    </tr>
                </tbody>
            <tfoot>
                <tr>
                    <th scope="row" colspan="3" style="text-align: right; font-size: 40px;">
                        <BOLD>
                            TOTAL:
                        </BOLD>
                    </th>
                    
                    <td colspan="1">
                        $ <?php echo $total ?>
                    </td>
                </tr>
                <tr>
                <form action="TerminarVenta.php?idventa=<?php echo $IDORDEN; ?>&total=<?php echo $total; ?>" method="POST">
                <td colspan="4" style="text-align: center">
                        
                            <text>
                                CLIENTE:
                            </text>
                            <select style="font-size: 18px;" name="cmbCliente">
                            
                            <?php
                            include('Base de Datos/Conexion/conexion.php');
                            $SQL="SELECT * FROM `clientes`";
                            $ResClientes=$Conexion->query($SQL);
                            while($Fila=$ResClientes->fetch_array()){
                            echo "<option value=".$Fila ['ClienteID']."> ".$Fila['Nombre']."</option>"."<br>";
                                }
                            ?>
                            </select>
                    </td>
                            </tr>
                <tr>
                    <th colspan="4" style="text-align: center; font-size: 20px;" name="btnImprimir">
                    <INPUT type="submit" class="button button1" value="Finalizar Compra"></button>
                    </th>
                </tr>
                </form>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                </tr>
            </tfoot>
        </TABLE>
        <br>
        <br>
    </DIV>
</BODY>

</HTML>