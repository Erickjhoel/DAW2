<?php
include_once 'clases.php';
function test_imput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($_POST['aceptar'])) {
    ?>
<form action="usabilidad.php" method="POST">
        Nombre Jugador 1: <input type="text" name="nom1">	
        Ficha Jugador 1:
        <select name="ficha">
            <option value="x" selected="selected">X</option>
            <option value="o">O</option>
        </select>
        <br>
        Nombre Jugador 2: <input type="text" name="nom2">	
        <br>

        <input type="submit" name="aceptar" value="Aceptar">
    </form>

 <?php 
 
}else{
     session_start();
    $nom1 = test_imput($_REQUEST['nom1']);
    print ("El nombre del jugador 1 es: $nom1 <br>");
    $_SESSION["jug1"]=$nom1;
    $nom2 = test_imput($_REQUEST['nom2']);
    print ("El nombre del jugador 2 es: $nom2 <br>");
    $_SESSION["jug2"]=$nom2;
 } ?>