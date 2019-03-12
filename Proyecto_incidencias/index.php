<!DOCTYPE html>
<!--
    Cosas que quedan por hacer:
        - Un menú que te mostrara la noticia que deseas.
        - Crear 4 archivos para cada noticia
        - Ponerlo bonito.
    Extra:
        -
-->
<html>
    <head>
        <title>INCIDENCIAS TIC</title>
        <meta charset="UTF-8">
        <meta name="author" content="Erick Toledo">
        <meta name="description" content="Apertura de cuentas">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        echo "<h1>AQUI VA LA TABLA DE INCIDENCIAS</h1>";
        ?>
        <form name="myForm1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return CompruebaCuent()"  method="POST">
            Nombre de Incidentes(Tú): <input type="text" name="ncuenta" required="required">	

            Titulo de Incidencia: <input type="text" name="ncuenta" required="required">
            <br />
            Aula de la Incidencia: <input type="text" name="ncuenta" required="required">	
            Equipo: <input type="text" name="ncuenta" required="required">	
            <br />
            Descripcion de la Incidencia:<br />
            <textarea rows="4" cols="100" name="ncuenta" required="required" ></textarea>
            <br />
            <input  type="submit" name="aceptar" value="Aceptar">
        </form>

    </body>
</html>

