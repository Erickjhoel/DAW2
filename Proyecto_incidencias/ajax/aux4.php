<?php

header("Content-Type: application/json; charset=UTF-8");
include '../BD/bd.php';
$con = ConectarBD();

$obj = json_decode($_POST['json']);
$id = $obj->id;
$nomProf = $obj->nomProf;
$nomInci = $obj->nomInci;
$aulaInci = $obj->aulaInci;
$equiInci = $obj->equiInci;
$descInci = $obj->descInci;
$correoInci = $obj->correoInci;
$estInci = $obj->estInci;
$modif = Modificar_Incidencia($con, $id, $nomProf, $nomInci, $aulaInci, $equiInci, $descInci, $correoInci, $estInci);
echo json_encode($modif);
?>

