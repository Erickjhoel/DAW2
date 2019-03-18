document.addEventListener("readystatechange", cargarEventos, false);
function cargarEventos() {
    window.addEventListener('load', function () {
        if (document.readyState === "complete") {
            window.addEventListener('load', datosTabla_in, false);
            document.getElementById("Res_in").addEventListener("click", resolver_in, false);
            document.getElementById("Cre_in").addEventListener("click", crear_in, false);
            document.getElementById("Mod_in").addEventListener("click", modificar_in, false);
        }
    });
}
function datosTabla_in() {
    var arrayInfo;
    $.ajax({
        url: '/resolverIn/resolverIncidencia.php',
        type: 'POST',
        beforeSend: function () {
            $("#resultado").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {
            if (Array.isArray(respuesta)) {
                arrayInfo = respuesta.entry;
            } else {

                var mi_Tabla = document.createElement("table");
                mi_Tabla.setAttribute("border", "1");
                var in_nompro = document.createTextNode("fecha de cuenta");
                var in_nomin = document.createTextNode("Hora de cuetna");
                var in_aula = document.createTextNode("Descripcion movimiento");
                var in_equi = document.createTextNode("Saldo");
                var in_desc = document.createTextNode("Hora de cuetna");
                var in_correo = document.createTextNode("Descripcion movimiento");
                var in_impor = document.createTextNode("Saldo");
                //ArrayCon el numero de cada fallo que puede ocurrir
            }

            $("#resultado").html(arrayInfo);
        },
        error: function (xhr, status) {
            $("#resultado").html(xhr);
        }
    });
}

function resolver_in() {
    alert("has pulsado en resolver");
}
function crear_in() {
    alert("has pulsado en crear");
}
function modificar_in() {
    alert("has pulsado en modificar");
}