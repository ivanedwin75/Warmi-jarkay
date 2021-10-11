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
                //cadena += "<th style = 'text-align: center'>NRO DE EXPEDIENTE</th>";
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
                    //cadena += "<td align='center'>" + valores[i][4] + "</td>";

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
                //cadena += "<th style = 'text-align: center'>NRO DE EXPEDIENTE</th>";
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

    var id_denuncia = eval(datos_split[0]);
    //alert(id_denuncia);
    $.ajax({
        url: '../controlador/institucion/controlador_get_denuncia.php',
        type: 'POST',
        data: {
            id_denuncia: id_denuncia
        },
        beforeSend: function() {
            $("#loading_almacen").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        complete: function() {
            $("#loading_almacen").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        success: function(resp) {
            var data = JSON.parse(resp);
            //alert(data);
            $("#txtofifiscalia").val(data[1]);
            $("#txtofijuzgado").val(data[2]);
            $("#niv_riesgo").val(data[3]);

            $("#txtfiscalia").val(data[4]);
            $("#txtfiscal").val(data[5]);
            $("#txtf_fiscalia").val(data[6]);

            $("#txtexp_juzgado").val(data[7]);
            $("#txtjuzgado").val(data[8]);
            $("#txtjuez").val(data[9]);
            $("#txtf_juzgado").val(data[10]);

            $("#txtden_scan").val(data[11]);
            $("#txtdem_elec").val(data[12]);
            $("#Per_psico").val(data[13]);
            $("#Certi_med").val(data[14]);

            $("#at_facultativa").val(data[15]);
            $("#incap_medico").val(data[16]);
            $("#CEM_label").val(data[17]);
            $("#CEM").val(data[18]);
            $("#SAW_label").val(data[19]);
            $("#SAW").val(data[20]);
            $("#Social_CEM_label").val(data[21]);
            $("#Social_CEM").val(data[22]);
            $("#txtmed_prot").val(data[23]);
            //alert(data[13]);
            $("#txtinstructor").val(data[24]);

            if (resp > 0) {
                //$('#modal_editar_denuncia').modal('hide');
                swal("Datos completos!", "", "success");
                //var dato_buscar = $("#txt_institucion_vista").val();
                //listar_institucion_vista(dato_buscar, '1');
            } else {
                swal("Esta información será vista por los usuarios del aplicativo", "", "info");
            }

        }
    });
}

function Editar_denuncia() {
    var id_denuncia = $("#txtid_denuncia").val();
    var ofi_juzgado = $("#txtofijuzgado").val();
    var ofi_fiscalia = $("#txtofifiscalia").val();
    var niv_riesgo = $("#niv_riesgo").val();

    var fiscalia = $("#txtfiscalia").val();
    var fiscal = $("#txtfiscal").val();
    var f_fiscalia = $("#txtf_fiscalia").val();

    var exp_juzgado = $("#txtexp_juzgado").val();
    var juzgado = $("#txtjuzgado").val();
    var juez = $("#txtjuez").val();
    var f_juzgado = $("#txtf_juzgado").val();

    var den_scan = $("#txtden_scan").val();
    var dem_elec = $("#txtdem_elec").val();
    var per_psico = $("#Per_psico").val();
    var certi_med = $("#certi_med").val();
    var at_facultativa = $("#at_facultativa").val();
    var incap_medico = $("#incap_medico").val();
    var cem_label = $("#CEM_label").val();
    var cem = $("#CEM").val();
    var saw_label = $("#SAW_label").val();
    var saw = $("#SAW").val();
    var social_label = $("#Social_CEM_label").val();
    var social_cem = $("#Social_CEM").val();
    var med_prot = $("#txtmed_prot").val();
    var instructor = $("#txtinstructor").val();

    var formData = new FormData();
    formData.append("txtid_denuncia", id_denuncia);
    formData.append("txtofijuzgado", ofi_juzgado);
    formData.append("txtofifiscalia", ofi_fiscalia);
    formData.append("niv_riesgo", niv_riesgo);

    formData.append("txtfiscalia", fiscalia);
    formData.append("txtfiscal", fiscal);
    formData.append("txtf_fiscalia", f_fiscalia);

    formData.append("txtexp_juzgado", exp_juzgado);
    formData.append("txtjuzgado", juzgado);
    formData.append("txtjuez", juez);
    formData.append("txtf_juzgado", f_juzgado);

    formData.append("arch_den_scan", document.getElementById('arch_den_scan').files[0]);
    formData.append("arch_dem_elec", document.getElementById('arch_dem_elec').files[0]);
    formData.append("Per_psico", per_psico);
    formData.append("certi_med", certi_med);
    formData.append("at_facultativa", at_facultativa);
    formData.append("incap_medico", incap_medico);
    formData.append("CEM_label", cem_label);
    formData.append("arch_cem", document.getElementById('arch_cem').files[0]);
    formData.append("SAW_label", saw_label);
    formData.append("arch_saw", document.getElementById('arch_saw').files[0]);
    formData.append("Social_CEM_label", social_label);
    formData.append("arch_social_cem", document.getElementById('arch_social_cem').files[0]);
    formData.append("arch_med_prot", document.getElementById('arch_med_prot').files[0]);
    formData.append("txtinstructor", instructor);

    formData.append("txtden_scan", den_scan);
    formData.append("txtdem_elec", dem_elec);
    formData.append("CEM", cem);
    formData.append("SAW", saw);
    formData.append("Social_CEM", social_cem);
    formData.append("txtmed_prot", med_prot);


//debugger;
    /*
    if (institucion.length > 0 && tipo.length > 0) {} else {
        return swal("Falta Llenar Datos", "", "info");
    }

    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
    }
    */
    $.ajax({
        url: '../controlador/institucion/controlador_editar_institucion.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        
        beforeSend: function(){
            $("#loading_almacen").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },

        complete: function() {
            $("#loading_almacen").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        
        success: function() {
            $('#modal_editar_denuncia').modal('hide');
            swal("Datos Actualizados!", "", "success");
        }

    });

    /*
    $.ajax({
            url: '../controlador/institucion/controlador_editar_institucion.php',
            type: 'POST',
            data: {
                id_denuncia: id_denuncia,
                ofi_fiscalia: ofi_fiscalia,
                ofi_juzgado: ofi_juzgado,
                niv_riesgo: niv_riesgo,
                fiscalia: fiscalia,
                fiscal: fiscal,
                f_fiscalia: f_fiscalia,
                exp_juzgado: exp_juzgado,
                juzgado: juzgado,
                juez: juez,
                f_juzgado: f_juzgado,
                den_scan: den_scan,
                dem_elec: dem_elec,
                per_psico: per_psico,
                certi_med: certi_med,
                at_facultativa: at_facultativa,
                incap_medico: incap_medico,
                cem_label: cem_label,
                cem: cem,
                saw_label: saw_label,
                saw: saw,
                social_label: social_label,
                social_cem: social_cem,
                med_prot: med_prot,
                instructor: instructor
            }
        })
        .success(function(resp) {
            //if (resp > 0) {
            //alert(ofi_fiscalia);
            $('#modal_editar_denuncia').modal('hide');
            swal("Datos Actualizados!", "", "success");
            //var dato_buscar = $("#txt_institucion_vista").val();
            //listar_institucion_vista(dato_buscar, '1');
            //} else {
            //swal("! Lo sentimos la institucion ya fue registrada con anterioridad!", "", "error");
            //}
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
*/

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

function ValidarImagen() {
    var archivo = document.getElementById('archivo');
    archivo.onchange = (ev) => {
        var file = ev.target.files[0];
        var extenciones_p = ['pdf'];
        var tamano_m = function(mega) {
            return Math.pow(2, 20) * mega;
        }
        var extencion = file.type.split('/').pop();
        if (extenciones_p.indexOf(extencion) != -1) {
            if (file.size <= tamano_m(1)) {
                subirImg(file);
            } else {
                console.log("El archivo es muy grande solo se admiten archivos maximo de 1mb");
                archivo.value = "";
            }
        } else {
            console.log("no se encontro la extencion, extenciones validas: " + extenciones_p.toString());
            archivo.value = "";
        }
    }



    var formulario = document.getElementById('frm_datos');

    formulario.addEventListener('submit', (ev) => {
        ev.preventDefault();
        if (archivo.files.length == 0 || document.getElementById('nombre').value == "") {
            console.log("Verifica que ninguno de los campos este vacio");
            return
        }
        var dataform = new FormData(formulario);
        dataform.append('imagen', archivo.files[0]);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'server.php');
        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log("se enviaron dtos");
            } else {
                console.log("Ocurrio un error al enviar los datos" + xhr.status);
            }
        }
        xhr.send(dataform);
    })


}

function subirImg(file) {
    var file_r = new FileReader();
    var progress = document.getElementById('progreso');
    var preview = document.getElementById('muestra');
    var etiqueta = document.getElementById('etiqueta');

    file_r.onloadstart = (ev) => {
        console.log("comenzando");
        console.log("se cargo: " + ev.loaded);
    }
    file_r.onloadend = (ev) => {
        console.log("termino");
        console.log("se cargo: " + ev.loaded);
    }
    file_r.onprogress = (ev) => {
        progress.value = (ev.loaded * 100) / ev.total;
        etiqueta.innerHTML = Math.round(progress.value) + "%";
        // total =>  100%
        // loaded => ?
    }
    file_r.onload = (ev) => {
        preview.src = file_r.result;
    }
    file_r.readAsDataURL(file);
}