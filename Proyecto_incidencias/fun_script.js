document.addEventListener("readystatechange", cargarEventos, false);
function cargarEventos() {
    window.addEventListener('load', function () {
        if (document.readyState === "complete") {
            window.addEventListener("load", datosTabla_in(), false);
            document.getElementById("Res_in").addEventListener("click", resolver_in, false);
            document.getElementById("Cre_in").addEventListener("click", crear_in, false);
            document.getElementById("Mod_in").addEventListener("click", modificar_in, false);
        }
    });
}
function datosTabla_in() {
    $.ajax({
        url: './ajax/aux1.php',
        type: 'POST',
        beforeSend: function () {
            $("#resul_tabla").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {
            var mi_Tabla = document.createElement("table");
            mi_Tabla.setAttribute("border", "1");
            var in_nompro = document.createTextNode("Nombre de profesor");
            var in_nomin = document.createTextNode("Nombre Incidencia");
            var in_aula = document.createTextNode("Aula de la Incidencia");
            var in_equi = document.createTextNode("Equipo afectado");
            var in_desc = document.createTextNode("Descripcion Incidencias");
            var in_correo = document.createTextNode("Correo");
            var in_impor = document.createTextNode("Importancia");
            var tr_titulo = document.createElement("tr");
            mi_Tabla.appendChild(tr_titulo);
            var array_titulos = new Array(in_nompro, in_nomin, in_aula, in_equi, in_desc, in_correo, in_impor);
            for (var i = 0; i < array_titulos.length; i++) {
                var mi_td = document.createElement("td");
                mi_td.appendChild(array_titulos[i]);
                tr_titulo.appendChild(mi_td);
            }

            if (Array.isArray(respuesta)) {
                for (var i = 0; i < respuesta.length; i++) {
                    var mi_tr = document.createElement("tr");
                    mi_Tabla.appendChild(mi_tr);
                    for (var e in respuesta[i]) {
                        var mi_td2 = document.createElement("td");
                        var dato = document.createTextNode(respuesta[i][e]);
                        mi_td2.appendChild(dato);
                        mi_tr.appendChild(mi_td2);
                    }
                }
                //Mostrar los datos rersividos DE LA BASE DE DATOS 
            } else {
                var pre_det = "Ha ocurrido un fallo al solicitar los datos de la tabla, el error ha sido el siguiente: ";
                var mensaje_mostrar;
                var mi_trFallo = document.createElement("tr");
                mi_Tabla.appendChild(mi_trFallo);
                if (respuesta === 1) {
                    mensaje_mostrar = document.createTextNode(pre_det + respuesta);
                    mi_trFallo.appendChild(mensaje_mostrar);
                } else if (respuesta === 2) {
                    mensaje_mostrar = document.createTextNode(pre_det + respuesta);
                    mi_trFallo.appendChild(mensaje_mostrar);
                } else if (respuesta === 3) {
                    mensaje_mostrar = document.createTextNode(pre_det + respuesta);
                    mi_trFallo.appendChild(mensaje_mostrar);
                } else {
                    mensaje_mostrar = document.createTextNode(pre_det + respuesta);
                    mi_trFallo.appendChild(mensaje_mostrar);
                }
            }

            $("#resul_tabla").html(mi_Tabla);
        },
        error: function (xhr, status) {
            $("#resul_tabla").html(xhr);
        }
    });
}
function resolver_in() {
    alert("has pulsado en resolvers");
    $.ajax({
        url: '/ajax/aux2.php',
        type: 'POST',
        beforeSend: function () {
            $("#resultado").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {

            $("#resultado").html(mi_Tabla);
        },
        error: function (xhr, status) {
            $("#resultado").html(xhr);
        }
    });
}
function crear_in() {
    alert("has pulsado en crear");
    $.ajax({
        url: '/ajax/aux3.php',
        type: 'POST',
        beforeSend: function () {
            $("#resultado").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {

            $("#resultado").html(mi_Tabla);
        },
        error: function (xhr, status) {
            $("#resultado").html(xhr);
        }
    });
}
function modificar_in() {
    alert("has pulsado en modificar");
    $.ajax({
        url: '/ajax/aux4.php',
        type: 'POST',
        beforeSend: function () {
            $("#resultado").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {

            $("#resultado").html(mi_Tabla);
        },
        error: function (xhr, status) {
            $("#resultado").html(xhr);
        }
    });
}