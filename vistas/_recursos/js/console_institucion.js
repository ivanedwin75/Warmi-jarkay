function listar_institucion_vista(valor, pagina) {
    var pagina = Number(pagina);
    $.ajax({
        url: '../controlador/institucion/controlador_ListarBuscar_institucion.php',
        type: 'POST',
        data: 'valor=' + valor + '&pagina=' + pagina + '&boton=buscar',
        beforeSend: function() {
            $("#loading_almacen").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        complete: function() {
            $("#loading_almacen").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        success: function(resp) {
            var datos = resp.split("*");
            var valores = eval(datos[0]);
            if (valores.length > 0) {
                var cadena = "";
                cadena += "<table  class='table table-condensed jambo_table'>";
                cadena += "<thead  class=''>";
                cadena += "<tr >";
                cadena += "<th style = 'text-align: center' hidden='true' >ID</th>";
                cadena += "<th style = 'text-align: center'>NRO DE EXPEDIENTE</th>";
                cadena += "<th style = 'text-align: center'>DNI</th>";
                cadena += "<th style = 'text-align: center'>DENUNCIANTE</th>";
                cadena += "<th style = 'text-align: center'>FECHA DE REGISTRO</th>";
                cadena += "<th style = 'text-align: center'>OPCIONES</th>";
                cadena += "</tr>";
                cadena += "</thead>";
                cadena += "<tbody style='background-color:white'>";
                for (var i = 0; i < valores.length; i++) {
                    cadena += "<tr>";
                    cadena += "<td align='center' hidden>" + valores[i][0] + "</td>";
                    cadena += "<td align='center'>" + valores[i][1] + "</td>";
                    cadena += "<td align='center'>" + valores[i][2] + "</td>";
                    cadena += "<td align='center'>" + valores[i][3] + "</td>";
                    cadena += "<td align='center'>" + valores[i][4] + "</td>";

                    /*
					if (valores[i][3] == "INACTIVO") {
                        cadena += "<td style = 'text-align: center'> <span class='badge bg-danger' style='color:White;'>" + valores[i][3] + "</span> </td>";
                    } else {
                        cadena += "<td  style = 'text-align: center'> <span class='badge bg-success' style='color:White;'>" + valores[i][3] + "</span> </td>";
                    }
					*/
                    cadena += "<td><button name='" + valores[i][0] + '*' + valores[i][1] + "' class='btn btn-primary' onclick='AbrirModalInstitucion(this)'><span class='glyphicon glyphicon-pencil'></span>";
                    cadena += "</button></td> ";
                    cadena += "</tr>";
                }
                cadena += "</tbody>";
                cadena += "</table>";
                $("#listar_institucion_tabla").html(cadena);
                var totaldatos = datos[1];
                var numero_paginas = Math.ceil(totaldatos / 5);
                var paginar = "<ul class='pagination'>";
                if (pagina > 1) {
                    paginar += "<li><a href='javascript:void(0)' onclick='listar_institucion_vista(" + '"' + valor + '","' + 1 + '"' + ")'>&laquo;</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='listar_institucion_vista(" + '"' + valor + '","' + (pagina - 1) + '"' + ")'>Anterior</a></li>";
                } else {
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>Anterior</a></li>";
                }
                limite = 10;
                div = Math.ceil(limite / 2);
                pagina_inicio = (pagina > div) ? (pagina - div) : 1;
                if (numero_paginas > div) {
                    pagina_restante = numero_paginas - pagina;
                    pagina_fin = (pagina_restante > div) ? (pagina + div) : numero_paginas;
                } else {
                    pagina_fin = numero_paginas;
                }
                for (i = pagina_inicio; i <= pagina_fin; i++) {
                    if (i == pagina) {
                        paginar += "<li class='active'><a href='javascript:void(0)'>" + i + "</a></li>";
                    } else {
                        paginar += "<li><a href='javascript:void(0)' onclick='listar_institucion_vista(" + '"' + valor + '","' + i + '"' + ")'>" + i + "</a></li>";
                    }
                }
                if (pagina < numero_paginas) {
                    paginar += "<li><a href='javascript:void(0)' onclick='listar_institucion_vista(" + '"' + valor + '","' + (pagina + 1) + '"' + ")'>Siguiente</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='listar_institucion_vista(" + '"' + valor + '","' + numero_paginas + '"' + ")'>&raquo;</a></li>";
                } else {
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
                }
                paginar += "</ul>";
                $("#paginador_institucion_vista").html(paginar);
            } else {
                var cadena = "";
                cadena += "<table  class='table table-condensed jambo_table'>";
                cadena += "<thead  class=''>";
                cadena += "<tr >";
                cadena += "<th style = 'text-align: center' hidden='true' >ID</th>";
                cadena += "<th style = 'text-align: center'>NRO DE EXPEDIENTE</th>";
                cadena += "<th style = 'text-align: center'>DNI</th>";
                cadena += "<th style = 'text-align: center'>DENUNCIANTE</th>";
                cadena += "<th style = 'text-align: center'>FECHA DE REGISTRO</th>";
                cadena += "</tr>";
                cadena += "</thead>";
                cadena += "<tbody>";
                cadena += "<tr style = 'text-align: center'><td colspan='4'><strong>No se encontraron registros</strong></td></tr>";
                cadena += "</tbody>";
                cadena += "</table>";
                $("#listar_institucion_tabla").html(cadena);
                $("#paginador_institucion_tabla").html("");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR) {
            alert("SE PRODUJO UN ERROR");
        }
    });
}

function AbrirModalInstitucion(control) {
    var datos = control.name;
    var datos_split = datos.split("*");
    $('#modal_editar_denuncia').modal({ backdrop: 'static', keyboard: false })
    $('#modal_editar_denuncia').modal('show');
    $('#txtid_denuncia').val(datos_split[0]);

    var id_denuncia = datos_split[0];
    $.ajax({
            url: '../controlador/institucion/controlador_get_denuncia.php',
            type: 'POST',
            data: {
                id_denuncia: id_denuncia
            }
        })
        .done(function(resp) {
            var data = JSON.parse(resp);
            //var id_denuncia = $("#txtid_denuncia").val();
            $("#txtofifiscalia").val(data[2]);
            $("#txtofijuzgado").val(data[3]);
            $("#niv_riesgo").val(data[4]);

            $("#txtexp_fiscalia").val(data[5]);
            $("#txtfiscalia").val(data[6]);
            $("#txtfiscal").val(data[7]);
            $("#txtf_fiscalia").val(data[8]);

            $("#txtexp_juzgado").val(data[9]);
            $("#txtjuzgado").val(data[10]);
            $("#txtjuez").val(data[11]);
            $("#txtf_juzgado").val(data[12]);

            $("#txtden_scan").val(data[13]);
            $("#txtdem_elec").val(data[14]);
            $("#txtmed_prot").val(data[15]);

            $("#txtinstructor").val(data[16]);

            if (resp > 0) {
                //$('#modal_editar_denuncia').modal('hide');
                swal("Datos Actualizados!", "", "success");
                //var dato_buscar = $("#txt_institucion_vista").val();
                //listar_institucion_vista(dato_buscar, '1');
            } else {
                swal("! Lo sentimos no pudimos completar los datos", "", "error");
            }
        })
}


//$('#cmb_estado').val(datos_split[3]).trigger("change");

function Editar_denuncia() {
    var id_denuncia = $("#txtid_denuncia").val();
    var ofi_fiscalia = $("#txtofifiscalia").val();
    var ofi_juzgado = $("#txtofijuzgado").val();
    var niv_riesgo = $("#niv_riesgo").val();


    var exp_fiscalia = $("#txtexp_fiscalia").val();
    var fiscalia = $("#txtfiscalia").val();
    var fiscal = $("#txtfiscal").val();
    var f_fiscalia = $("#txtf_fiscalia").val();

    var exp_juzgado = $("#txtexp_juzgado").val();
    var juzgado = $("#txtjuzgado").val();
    var juez = $("#txtjuez").val();
    var f_juzgado = $("#txtf_juzgado").val();

    var den_scan = $("#txtden_scan").val();
    var dem_elec = $("#txtdem_elec").val();
    var med_prot = $("#txtmed_prot").val();

    var instructor = $("#txtinstructor").val();
    /*
    if (institucion.length > 0 && tipo.length > 0) {} else {
        return swal("Falta Llenar Datos", "", "info");
    }
    */
    $.ajax({
            url: '../controlador/institucion/controlador_editar_institucion.php',
            type: 'POST',
            data: {
                id_denuncia: id_denuncia,
                ofi_fiscalia: ofi_fiscalia,
                ofi_juzgado: ofi_juzgado,
                niv_riesgo: niv_riesgo,
                exp_fiscalia: exp_fiscalia,
                fiscalia: fiscalia,
                fiscal: fiscal,
                f_fiscalia: f_fiscalia,
                exp_juzgado: exp_juzgado,
                juzgado: juzgado,
                juez: juez,
                f_juzgado: f_juzgado,
                den_scan: den_scan,
                dem_elec: dem_elec,
                med_prot: med_prot,
                instructor: instructor
            }
        })
        .done(function(resp) {
            if (resp > 0) {
                $('#modal_editar_denuncia').modal('hide');
                swal("Datos Actualizados!", "", "success");
                var dato_buscar = $("#txt_institucion_vista").val();
                listar_institucion_vista(dato_buscar, '1');
            } else {
                swal("! Lo sentimos la institucion ya fue registrada con anterioridad!", "", "error");
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {

                alert('Not connect: Verify Network.');

            } else if (jqXHR.status == 404) {

                alert('Requested page not found [404]');

            } else if (jqXHR.status == 500) {

                alert('Internal Server Error [500].');

            } else if (textStatus === 'parsererror') {

                alert('Requested JSON parse failed.');

            } else if (textStatus === 'timeout') {

                alert('Time out error.');

            } else if (textStatus === 'abort') {

                alert('Ajax request aborted.');

            } else {

                alert('Uncaught Error: ' + jqXHR.responseText);

            }
        })
}

function Registrar_denuncia() {

    var id_denuncia = $("#txtid_denuncia").val();
    var ofi_fiscalia = $("#txtofifiscalia").val();
    var ofi_juzgado = $("#txtofijuzgado").val();
    var niv_riesgo = $("#txtniv_riesgo").val();


    var exp_fiscalia = $("#txtexp_fiscalia").val();
    var fiscalia = $("#txtfiscalia").val();
    var fiscal = $("#txtfiscal").val();
    var f_fiscalia = $("#txtf_fiscalia").val();

    var exp_juzgado = $("#txtexp_juzgado").val();
    var juzgado = $("#txtjuzgado").val();
    var juez = $("#txtjuez").val();
    var f_juzgado = $("#txtf_juzgado").val();

    var den_scan = $("#txtden_scan").val();
    var dem_elec = $("#txtdem_elec").val();
    var med_prot = $("#txtmed_prot").val();

    var instructor = $("#txtinstructor").val();

    /*
    if (institucion.length > 0 && tipo.length > 0) {} else {
        return swal("Falta Llenar Datos", "", "info");
    }
*/

    $.ajax({
            url: '../controlador/institucion/controlador_registrar_denuncia.php',
            type: 'POST',
            data: {
                id_denuncia: id_denuncia,
                ofi_fiscalia: ofi_fiscalia,
                ofi_juzgado: ofi_juzgado,
                niv_riesgo: niv_riesgo,
                exp_fiscalia: exp_fiscalia,
                fiscalia: fiscalia,
                fiscal: fiscal,
                f_fiscalia: f_fiscalia,
                exp_juzgado: exp_juzgado,
                juzgado: juzgado,
                juez: juez,
                f_juzgado: f_juzgado,
                den_scan: den_scan,
                dem_elec: dem_elec,
                med_prot: med_prot,
                instructor: instructor
            }
        })
        .done(function(resp) {
            if (resp > 0) {
                swal("Datos Registrados!", "", "success")
                    .then((value) => {
                        $("#main-content").load("Institucion/vista_institucion_listar.php");
                    });
            } else {
                swal("! Lo sentimos el area ya fue registrada con anterioridad!", "", "error");
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {

                alert('Not connect: Verify Network.');

            } else if (jqXHR.status == 404) {

                alert('Requested page not found [404]');

            } else if (jqXHR.status == 500) {

                alert('Internal Server Error [500].');

            } else if (textStatus === 'parsererror') {

                alert('Requested JSON parse failed.');

            } else if (textStatus === 'timeout') {

                alert('Time out error.');

            } else if (textStatus === 'abort') {

                alert('Ajax request aborted.');

            } else {

                alert('Uncaught Error: ' + jqXHR.responseText);

            }
        })
}