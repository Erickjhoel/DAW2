<?php
session_start();
function test_imput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
include_once 'clases.php';
    $ficha = test_imput($_REQUEST['ficha']);
    print ("La ficha es: $ficha <br>");
    $nomFicha = "";
    $nomFicha2 = "";
    $img = "";
    $img2 = "";
    if ($ficha == "x") {
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
        $ficha1 = new Ficha($_SESSION["jug1"], $img);
        $ficha2 = new Ficha($_SESSION["jug2"], $img2);
        $etiqueta = $ficha1->etiquetaImg();
        echo "$etiqueta";
        var_dump($ficha1);
        echo"<br />";
    //jugadores
        $jugador1 = new Jugador($nomFicha, $ficha1);
        $jugador2 = new Jugador($nomFicha2, $ficha2);
    //tablero
        $tablero = new Tablero($ficha1, $ficha2);//creas tablero
        $_SESSION["tablero"]=$tablero;//se guarda en sesion
        $_SESSION["tablero"]->iniciar();//se inicia a 0
        $tablero->mostrar();

        
        
        
//realiza CAMBIOS Y VUELVE A MOSRTAR LA TABLA
$fila= $_REQUEST["fila"];
$columna= $_REQUEST["columna"];
 $_SESSION["tablero"]->ponerFicha($_SESSION["tablero"]->getFicha(),$fila,$columna);
$_SESSION["tablero"]->cambioTurno();
$_SESSION["tablero"]->mostrar();
?>