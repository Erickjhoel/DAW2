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
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
        exit();
    }
    $arrayP = array();
    $contador = 0;
    $sqli = "SELECT at_id,at_nompro,at_titulo,at_aula,at_equi,at_descri,at_correo,at_estado,at_fechoy FROM anomalias_tic ORDER BY at_fechoy desc ";
    $result = $conn->query($sqli);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrayP[$contador] = $row;
            $contador++;
        }
        return $arrayP;
    }
}

function Resolver_Incidencia($conn, $id) {
    $retorno = false;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
        exit();
    }
    $sql = "DELETE FROM anomalias_tic WHERE at_id = $id";

    if ($conn->query($sql) === TRUE) {
        $retorno = true;
    } else {
        $retorno = false;
    }
    return $retorno;
}

function Crear_Incidencia($con, $nomProf, $nomInci, $aulaInci, $equiInci, $descInci, $correoInci) {
    $retorno = false;
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error) . "<br />";
    }
    if (!$con->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
        exit();
    }
    $cod_profe = BuscarProfe($con, $nomProf, $correoInci);
    if ($cod_profe != NULL) {
        $sql = 'INSERT INTO anomalias_tic ( at_codpro, at_nompro, at_titulo, at_descri, at_aula, at_equi, at_estado, at_correo)
VALUES ("' . $cod_profe . '","' . $nomProf . '","' . $nomInci . '","' . $descInci . '","' . $aulaInci . '","' . $equiInci . '", 1  ,"' . $correoInci . '")';
        if ($con->query($sql) === TRUE) {
            $retorno = true;
        } else {
            $retorno = false;
        }
    }


    return $retorno;
}

function BuscarProfe($conn, $nomProf, $correoInci) {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
        exit();
    }
    $sqli = 'SELECT at_codpro FROM anomalias_tic where at_nompro="' . $nomProf . '" and at_correo="' . $correoInci . '"';
    $result = $conn->query($sqli);
    if (!$result) {
        die('No se pudo encontrar a un profesor que concuerde con ese nombre y ese correo');
    } else {
       return $result;
    }
}

function Modificar_Incidencia($conn, $id, $nomProf, $nomInci, $aulaInci, $equiInci, $descInci, $correoInci, $estInci) {
    $retorno = false;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }
    //Para que funcione las ñ y tildes ********
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
        exit();
    }
    $sql = "UPDATE anomalias_tic SET at_nompro=\"$nomProf\", at_titulo=\"$nomInci\", at_descri=\"$descInci\", at_aula=\"$aulaInci\""
            . ", at_equi=\"$equiInci\", at_estado=\"$estInci\", at_correo=\"$correoInci\" WHERE at_id=$id";

    if ($conn->query($sql) === TRUE) {
        $retorno = true;
    } else {
        $retorno = false;
    }
    return $retorno;
}

?>