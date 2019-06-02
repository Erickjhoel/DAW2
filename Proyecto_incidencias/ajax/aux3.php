<?php

header("Content-Type: application/json; charset=UTF-8");
include '../BD/bd.php';
$con = ConectarBD();
$obj = json_decode($_POST['json']);

$nomProf = $obj->nomProf;
$nomInci = $obj->nomInci;
$aulaInci = $obj->aulaInci;
$equiInci = $obj->equiInci;
$descInci = $obj->descInci;
$correoInci = $obj->correoInci;

$inci = Crear_Incidencia($con, $nomProf, $nomInci, $aulaInci, $equiInci, $descInci, $correoInci);
echo json_encode($inci);
?>

