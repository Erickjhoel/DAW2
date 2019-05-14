<?php
include '../BD/bd.php';
$con = ConectarBD();
$datos = Obtener_Datos_Tabla($con);
 echo json_encode($datos);
?>

