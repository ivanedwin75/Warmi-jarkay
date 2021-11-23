function traer_estadisticas() {
    var codigo_personal = $("#txtcodigo_principal_usuario").val();
    $.ajax({
            url: '../controlador/estadisticas/controlador_traer_datos.php',
            type: 'POST',
        })
        .done(function(resp) {
            var data = JSON.parse(resp);
            if (data.length > 0) {
                $("#txtoriginal").val(data[0][8]);
                $("#txtnombre_usuario").html(data[0][0] + " " + data[0][1] + " " + data[0][2]);
                $("#txtnombre_usuario1").html(data[0][0] + " " + data[0][1] + " " + data[0][2]);
                $("#txtnombre_usuario2").html(data[0][0] + " " + data[0][1] + " " + data[0][2]);
                $("#nombres_personal").val(data[0][0]);
                $("#apePate_personal").val(data[0][1]);
                $("#apeMate_personal").val(data[0][2]);
                $("#email_personal").val(data[0][5]);
                $("#telefono_personal").val(data[0][6]);
                $("#movil_personal").val(data[0][7]);
                $("#direccion_personal").val(data[0][9]);
                if (data[0][10] != "0000-00-00") {
                    $("#fechanacimiento_personal").val(data[0][10]);
                }
                $("#dni_personal").val(data[0][11]);
                $("#txtimagen").html('<img style="width: auto; height: 100px;" src="../controlador/usuario/' + data[0][3] + '"> ');
                $("#txtimagen2").html('<img style="width: auto; height: 100px;" src="../controlador/usuario/' + data[0][3] + '" class="img-full">');
                $("#txtimagen1").html('<img class="user-image" src="../controlador/usuario/' + data[0][3] + '" alt="...">');
                $("#txtimagen3").html('<img  class="img-circle" style="width: 50px;height: 50px;" src="../controlador/usuario/' + data[0][3] + '" alt="...">');
                if (data[0][3] != "") {
                    var cadena = '<img src="../controlador/usuario/' + data[0][3] + '" class="kv-preview-data file-preview-image file-zoom-detail" style="width: 41%;">';
                    $("#id_imagen").html(cadena);
                } else {
                    var cadena = '<br><br><label>NO EXISTE IMAGEN</label><br><br><br>';
                    $("#id_imagen").html(cadena);
                }
            }

            cadena += "<table class = 'table table-responsive table-striped' >";
            cadena += "<thead><tr><th>Módulo</th><th>Indicador</th><th>Cantidad</th></tr></thead> ";
            cadena += "<tbody>";
            cadena += "<tr><td>Seguimiento</td><td>Cantidad de números</td><td>john @example.com</td></tr>";
            cadena += "<tr><td>Smith</td><td>Thomas</td><td>smith @example.com</td></tr>";
            cadena += "<tr><td>Merry</td><td>Jim</td><td>merry @example.com</td></tr> ";
            cadena += "</tbody> </table >";
        })
}

function abrirModalusuario() {
    $('#modal_cuenta').modal({ backdrop: 'static', keyboard: false })
    $("#modal_cuenta").modal("show");
}

function Editar_cuenta() {
    var usuario = $("#txtusuario").val();
    var actual = $("#txtactual").val();
    var nueva = $("#txtnueva").val();
    var repetir = $("#txtrepetir").val();
    var original = $("#txtoriginal").val();
    if (original != actual) {
        return swal("La contraseña no coincide con la actual", "contraseña incorrecta", "error");
    }
    if (nueva != repetir) {
        return swal("Debes ingresar la misma contraseña dos veces para confirmar", "", "warning");
    }
    $.ajax({
            type: 'POST',
            url: '../controlador/usuario/controlador_cuenta_actualizar.php',
            data: {
                _usuario: usuario,
                _actual: actual,
                _nueva: nueva
            }
        })
        .done(function(resp) {
            Limpiar_POST_cuenta();
            $("#modal_cuenta").modal("hide");
            if (resp > 0) {
                swal("Su cuenta fue Actualizada con Exito!!!", "", "success");
            } else {
                swal("No se pudo Actualizar su Cuenta!!!", "", "error");
            }
        })
}

function Limpiar_POST_cuenta() {
    $("#txtactual").val("");
    $("#txtnueva").val("");
    $("#txtrepetir").val("");
    traer_administrador();
}