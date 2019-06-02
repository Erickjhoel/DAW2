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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script>window.jQuery || document.write(unescape('%3Cscript src="lib/jquery-3.3.1.js"%3E%3C/script%3E'));</script>
        <script src="fun_script.js" type="text/javascript"></script>
    </head>
    <body>
        <h1> TABLA DE INCIDENCIAS</h1>
        <?php
        //$Permiso_Resolver=PermisoResolver();

        $Permiso_Resolver = true;
        ?>
        <div id="resul_tabla">

        </div>
        <form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST">
            ID (AUTOMÁTICO): <input type="text" name="id_in">
            Nombre de Incidentes(Tú): <input type="text" name="nom_in" required="required">
            Titulo de Incidencia: <input type="text" name="tit_in" required="required">
            <br /><hr />
            Aula de la Incidencia: <input type="text" name="au_inf" required="required">	
            Equipo: <input type="text" name="eq_in" required="required">	
            <br /><hr />
            Correo Electronico: <input type="text" name="ce_in" required="required">
            <br /><hr />
            Estado Incidencia (AUTOMÁTICO): <input type="text" name="est_in" required="required">
            <br /><hr />
            Descripcion de la Incidencia:<br />
            <textarea rows="4" cols="100" name="des_in" required="required" ></textarea>
            <br />
            <?php if ($Permiso_Resolver) {
                ?>
                <button id="Res_in" type="submit">Resolver</button>
                <?php
            } else {
                
            }
            ?>
            <button id="Cre_in" type="submit">Crear</button>
            <button id="Mod_in" type="submit">Modificar</button>
        </form>
        <div id="indicaciones">

        </div>
    </body>
</html>

