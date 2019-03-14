<?php

function ConectarBD() {
    $conn = new mysqli('localhost', 'root', '', 'Banco');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error) . "<br />";
    }else{
        return $conn;
    }
}
function CerrarBD($conn) {
    $conn->close();
}
?>