<?php

function ConectarBD() {
    $conn = new mysqli('localhost', 'root', '', 'pruebafinal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    } else {
        return $conn;
    }
}

function CerrarBD($conn) {
    $conn->close();
}

//Mostrar datos de la tabla
function Obtener_Datos_Tabla($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
    }
    $arrayP = array();
    $contador = 0;
    $sqli = "SELECT * FROM anomalias_tic ORDER BY at_fechoy desc ";
    $result = $conn->query($sqli);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrayP[$contador] = $row;
            $contador++;
        }
        return $arrayP;
    }
}

function Resolver_Incidencia($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
    }
    $sqli = "SELECT * FROM incidencias ORDER BY in_fech desc ";
    $result = $conn->query($sqli);
    if ($result->num_rows > 0) {//si el dni existe mostrar datos
        return $result;
    }
}

function Crear_Incidencia($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
    }
    $sqli = "SELECT * FROM incidencias ORDER BY in_fech desc ";
    $result = $conn->query($sqli);
    if ($result->num_rows > 0) {//si el dni existe mostrar datos
        return $result;
    }
}

function Modificar_Incidencia($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
    }
    $sqli = "SELECT * FROM incidencias ORDER BY in_fech desc ";
    $result = $conn->query($sqli);
    if ($result->num_rows > 0) {//si el dni existe mostrar datos
        return $result;
    }
}

?>