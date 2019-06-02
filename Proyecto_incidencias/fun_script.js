document.addEventListener("readystatechange", cargarEventos, false);
function cargarEventos() {
    window.addEventListener('load', function () {
        if (document.readyState == "complete") {
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
            var in_idpro = document.createTextNode("ID");
            var in_nompro = document.createTextNode("Nombre de profesor");
            var in_nomin = document.createTextNode("Nombre Incidencia");
            var in_aula = document.createTextNode("Aula de la Incidencia");
            var in_equi = document.createTextNode("Equipo afectado");
            var in_desc = document.createTextNode("Descripcion Incidencias");
            var in_correo = document.createTextNode("Correo");
            var in_impor = document.createTextNode("Estado");
            var in_fech = document.createTextNode("Fecha");
            var tr_titulo = document.createElement("tr");
            mi_Tabla.appendChild(tr_titulo);
            var array_titulos = new Array(in_idpro, in_nompro, in_nomin, in_aula, in_equi, in_desc, in_correo, in_impor, in_fech);
            for (var i = 0; i < array_titulos.length; i++) {
                var mi_td = document.createElement("td");
                mi_td.appendChild(array_titulos[i]);
                tr_titulo.appendChild(mi_td);
            }
            if (Array.isArray(respuesta)) {
                for (var i = 0; i < respuesta.length; i++) {
                    var mi_tr = document.createElement("tr");
                    mi_tr.setAttribute("id", "tr" + i);
                    mi_Tabla.appendChild(mi_tr);
                    for (var e in respuesta[i]) {
                        var mi_td2 = document.createElement("td");
                        var dato = document.createTextNode(respuesta[i][e]);
                        mi_td2.setAttribute("id", "valor" + e);
                        mi_td2.appendChild(dato);
                        mi_tr.appendChild(mi_td2);
                    }
                }
                $("#resul_tabla").html(mi_Tabla);
            } else {
                var pre_det = "Ha ocurrido un fallo al solicitar los datos de la tabla";
                $("#resul_tabla").html(pre_det);
            }


        },
        error: function (xhr, status) {
            $("#resul_tabla").html(xhr);
        }
    });
}
function resolver_in() {
    alert("has pulsado en resolvers");
    var id = document.forms["myForm"].elements["id_in"].value;
    var mis_datos = new Object();
    mis_datos.id = id;
    var mis_datos_JSON = JSON.stringify(mis_datos);
    var parametro = {
        "json": mis_datos_JSON
    };
    $.ajax({
        data: parametro,
        url: './ajax/aux2.php',
        type: 'POST',
        dataType: "json",
        beforeSend: function () {
            $("#indicaciones").html('<h3>Resolviendo Incidencia,  porfavor espere...');
        },
        success: function (respuesta) {
            if (respuesta) {
                alert("Su incidencia ha sido resuelta");
                location.reload();
            } else {
                alert("Ocurrio un error su incidencia no ha sido resuelta");
                location.reload();
            }
        },
        error: function (xhr, status) {
            $("#indicaciones").html(xhr);
        }
    });
}
function crear_in() {
    alert("has pulsado en crear");
    var nomProf = document.forms["myForm"].elements["nom_in"].value;
    var nomInci = document.forms["myForm"].elements["tit_in"].value;
    var aulaInci = document.forms["myForm"].elements["au_inf"].value;
    var equiInci = document.forms["myForm"].elements["eq_in"].value;
    var descInci = document.forms["myForm"].elements["des_in"].value;
    var correoInci = document.forms["myForm"].elements["ce_in"].value;

    var mis_datos = new Object();
    mis_datos.nomProf = nomProf;
    mis_datos.nomInci = nomInci;
    mis_datos.aulaInci = aulaInci;
    mis_datos.equiInci = equiInci;
    mis_datos.descInci = descInci;
    mis_datos.correoInci = correoInci;
    var mis_datos_JSON = JSON.stringify(mis_datos);
    var parametro = {
        "json": mis_datos_JSON
    };
    $.ajax({
        data: parametro, //datos que se envian a traves de ajax
        url: './ajax/aux3.php',
        type: 'POST',
        dataType: "json",
        beforeSend: function () {
            $("#indicaciones").html('<h3>Creando su incidencias, porfavor espere...');
        },
        success: function (respuesta) {
            if (respuesta) {
                alert("Su incidencia ha sido creada");
                location.reload();
            } else {
                alert("Ocurrio un error su incidencia no ha sido creada");
                location.reload();
            }
        },
        error: function (xhr, status) {
            $("#indicaciones").html(xhr);
        }
    });
}
function modificar_in() {
    alert("has pulsado en modificar");
    var id = document.forms["myForm"].elements["id_in"].value;
    var nomProf = document.forms["myForm"].elements["nom_in"].value;
    var nomInci = document.forms["myForm"].elements["tit_in"].value;
    var aulaInci = document.forms["myForm"].elements["au_inf"].value;
    var equiInci = document.forms["myForm"].elements["eq_in"].value;
    var descInci = document.forms["myForm"].elements["des_in"].value;
    var correoInci = document.forms["myForm"].elements["ce_in"].value;
    var estInci = document.forms["myForm"].elements["est_in"].value;

    var mis_datos = new Object();
    mis_datos.id = id;
    mis_datos.nomProf = nomProf;
    mis_datos.nomInci = nomInci;
    mis_datos.aulaInci = aulaInci;
    mis_datos.equiInci = equiInci;
    mis_datos.descInci = descInci;
    mis_datos.correoInci = correoInci;
    mis_datos.estInci = estInci;
    var mis_datos_JSON = JSON.stringify(mis_datos);
    var parametro = {
        "json": mis_datos_JSON
    };
    $.ajax({
        data: parametro, //datos que se envian a traves de ajax
        url: './ajax/aux4.php',
        type: 'POST',
        dataType: "json",
        beforeSend: function () {
            $("#resultado").html('<h3>Cargando Incidencias, porfavor espere...');
        },
        success: function (respuesta) {
            if (respuesta) {
                alert("Su incidencia se ha sido modificado correctamente");
                location.reload();
            } else {
                alert("Ocurrio un error su incidencia no se ha modificado");
                location.reload();
            }
        },
        error: function (xhr, status) {
            $("#resultado").html(xhr);
        }
    });
}