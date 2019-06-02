<?php

header("Content-Type: application/json; charset=UTF-8");
include '../BD/bd.php';
$con = ConectarBD();
$obj = json_decode($_POST['json']);
$id = $obj->id;

$resolv = Resolver_Incidencia($con, $id);

 echo json_encode($resolv);

?>

