<?php

include_once 'clases.php';
session_start();

function test_imput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

@$op = $_REQUEST["op"];

if ($op == 1) {
    @$fila = $_REQUEST["fila"];
    @$columna = $_REQUEST["columna"];
    $_SESSION["tablero"]->ponerFicha($_SESSION["tablero"]->getFicha(), $fila, $columna);
    $_SESSION["tablero"]->mostrar();
    $_SESSION["tablero"]->verificar(
            $_SESSION["tablero"]->getFicha(),
            $_SESSION["jugador1"],
            $_SESSION["jugador2"]
            );
    $_SESSION["tablero"]->cambioTurno();
    
   
} else {
    $nom1 = test_imput($_REQUEST['nom1']);
    $_SESSION["Numjug1"] = $nom1;
    $nom2 = test_imput($_REQUEST['nom2']);
    $_SESSION["Numjug2"] = $nom2;
    $ficha = test_imput($_REQUEST['ficha']);
    $_SESSION["fichon"] = $ficha;
    print ("La ficha es: $ficha <br>");
    $nomFicha = "";
    $nomFicha2 = "";
    $img = "";
    $img2 = "";
    if ( $_SESSION["fichon"] == "x") {
        $img = "img/x.jpg";
        $img2 = "img/0.jpg";
        $nomFicha = "x";
        $nomFicha2 = "0";
    } else {
        $img = "img/0.jpg";
        $img2 = "img/x.jpg";
        $nomFicha = "0";
        $nomFicha2 = "x";
    }

    //fichas
    $ficha1 = new Ficha($_SESSION["Numjug1"], $img);
    $ficha2 = new Ficha($_SESSION["Numjug2"], $img2);
    echo"<br />";
    //jugadores
    $jugador1 = new Jugador($nomFicha, $ficha1);
    $jugador2 = new Jugador($nomFicha2, $ficha2);
    $_SESSION["jugador1"]=$jugador1;
    $_SESSION["jugador2"]=$jugador2;
    //tablero
    $tablero = new Tablero($ficha1, $ficha2); //creas tablero
    $_SESSION["tablero"] = $tablero; //se guarda en sesion
    $_SESSION["tablero"]->iniciar(); //se inicia a 0
    $_SESSION["tablero"]->mostrar();
}
?>