<?php 
$enlace =  new mysqli('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error()."<br />");
}
$sql = "DROP DATABASE IF EXISTS pruebafinal";
if ($enlace->query($sql)) {
    echo "La base de datos Banco se borro correctamente <br />";
} else {
    echo 'Error al borrar la base de datos: ' .$enlace->error ."<br />";
}

$enlace->close();
?>