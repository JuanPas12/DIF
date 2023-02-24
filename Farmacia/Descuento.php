<?php
include('Base de Datos/Conexion/conexion.php');
  $orden = $_GET['idorden'];
  $total= intval($_GET['total']);
  $descuento = intval($_POST ['txtDescuento']);
  $nuevo_total = 0;
  $total_final = 0;


 $nuevo_total = (($total / 100) * $descuento);
 $total_final = $total - $nuevo_total;
  echo $total_final;
    echo "<script>
			document.location = 'GenerarVentaDescuento.php?idp=".$orden."&totalf=".$total_final."&desc=".$descuento."';
		</script>";
?>