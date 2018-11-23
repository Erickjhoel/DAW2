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
 } ?>