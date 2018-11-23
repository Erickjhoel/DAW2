<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ejercicios </title>
        <link href="cssTresEnRaya.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php 
         $ganador=$_REQUEST['ganador'];
        echo" <div class=\"ganador\" >El Ganador es: ".$ganador." </div>";
        ?>
        <div class="im">
            <div class="ete">
                <img  src="img/homer.png" alt="" height="500" width="300"/>
            </div> 
        </div>
        <div class="revancha">
            <a  href="formulario.php">Volver a Jugar ¡Revancha!</a>
        </div>
        
    </body>
</html>