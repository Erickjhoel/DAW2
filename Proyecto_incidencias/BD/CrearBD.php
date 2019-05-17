<?php
$enlace = new mysqli('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error() . "<br />");
}

$sql = "CREATE DATABASE pruebafinal";
if ($enlace->query($sql)) {
    echo "La base de datos pruebafinal se creo correctamente <br />";
} else {
    echo 'Error al crear la base de datos: ' . $enlace->error . "<br />";
}
$enlace->close();

$conn = new mysqli('localhost', 'root', '', 'pruebafinal');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error) . "<br />";
}
$sql = "CREATE TABLE anomalias_tic (at_id mediumint(8) NOT NULL AUTO_INCREMENT, " .
        "at_codpro varchar(9) NOT NULL, " .
        "at_nompro varchar(50) NOT NULL, " .
        "at_titulo varchar(50) NOT NULL, " .
        "at_descri varchar(255) NOT NULL, " .
        "at_aula varchar(50) NOT NULL, " .
        "at_equi varchar(255) NOT NULL, " .
        "at_estado char(1) NOT NULL, " .
        "at_correo varchar(50) NOT NULL, " .
        "at_fechoy timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP," .
        "PRIMARY KEY (at_id), KEY at_codpro (at_codpro)) ENGINE=InnoDB DEFAULT CHARSET = utf8";

if ($conn->query($sql)) {
    echo "Table MyGuests created successfully <br />";
} else {
    echo "Error creating table: " . $conn->error . "<br />";
}
$sqli2 = "INSERT INTO anomalias_tic (at_codpro, at_nompro, at_titulo,at_descri,at_aula,at_equi,at_estado,at_correo)" .
        "VALUES ('1','PRUEBAS','El ORDENA PETO','El ordenador esta bien y volo','25E','ueydge','1','toledoerick1999@gmail.com')";

if ($conn->query($sqli2) === TRUE) {
    echo "New record created successfully <br />";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br />";
}

$conn->close();
?>