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
            $("#resultado").html('<h3>Cargando, porfavor espere...');
        },
        success: function (respuesta) {
            arrayInfo = respuesta.entry;
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