jQuery(document).ready(function($) {
    var timelines = $('.cd-horizontal-timeline'),
        eventsMinDistance = 30;

    (timelines.length > 0) && initTimeline(timelines);

    function initTimeline(timelines) {
        timelines.each(function() {
            var timeline = $(this),
                timelineComponents = {};
            //cache timeline components 
            timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
            timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
            timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
            timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
            timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
            timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
            timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
            timelineComponents['eventsContent'] = timeline.children('.events-content');

            //assign a left postion to the single events along the timeline
            setDatePosition(timelineComponents, eventsMinDistance);
            //assign a width to the timeline
            var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
            //the timeline has been initialize - show it
            timeline.addClass('loaded');

            //detect click on the next arrow
            timelineComponents['timelineNavigation'].on('click', '.next', function(event) {
                event.preventDefault();
                updateSlide(timelineComponents, timelineTotWidth, 'next');
            });
            //detect click on the prev arrow
            timelineComponents['timelineNavigation'].on('click', '.prev', function(event) {
                event.preventDefault();
                updateSlide(timelineComponents, timelineTotWidth, 'prev');
            });
            //detect click on the a single event - show new event content
            timelineComponents['eventsWrapper'].on('click', 'a', function(event) {
                event.preventDefault();
                timelineComponents['timelineEvents'].removeClass('selected');
                $(this).addClass('selected');
                updateOlderEvents($(this));
                updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
                updateVisibleContent($(this), timelineComponents['eventsContent']);
            });

            //on swipe, show next/prev event content
            timelineComponents['eventsContent'].on('swipeleft', function() {
                var mq = checkMQ();
                (mq == 'mobile') && showNewContent(timelineComponents, timelineTotWidth, 'next');
            });
            timelineComponents['eventsContent'].on('swiperight', function() {
                var mq = checkMQ();
                (mq == 'mobile') && showNewContent(timelineComponents, timelineTotWidth, 'prev');
            });

            //keyboard navigation
            $(document).keyup(function(event) {
                if (event.which == '37' && elementInViewport(timeline.get(0))) {
                    showNewContent(timelineComponents, timelineTotWidth, 'prev');
                } else if (event.which == '39' && elementInViewport(timeline.get(0))) {
                    showNewContent(timelineComponents, timelineTotWidth, 'next');
                }
            });
        });
    }

    function updateSlide(timelineComponents, timelineTotWidth, string) {
        //retrieve translateX value of timelineComponents['eventsWrapper']
        var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
            wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
        //translate the timeline to the left('next')/right('prev') 
        (string == 'next') ?
        translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth): translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
    }

    function showNewContent(timelineComponents, timelineTotWidth, string) {
        //go from one event to the next/previous one
        var visibleContent = timelineComponents['eventsContent'].find('.selected'),
            newContent = (string == 'next') ? visibleContent.next() : visibleContent.prev();

        if (newContent.length > 0) { //if there's a next/prev event - show it
            var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
                newEvent = (string == 'next') ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');

            updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
            updateVisibleContent(newEvent, timelineComponents['eventsContent']);
            newEvent.addClass('selected');
            selectedDate.removeClass('selected');
            updateOlderEvents(newEvent);
            updateTimelinePosition(string, newEvent, timelineComponents, timelineTotWidth);
        }
    }

    function updateTimelinePosition(string, event, timelineComponents, timelineTotWidth) {
        //translate timeline to the left/right according to the position of the selected event
        var eventStyle = window.getComputedStyle(event.get(0), null),
            eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
            timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
            timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
        var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

        if ((string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < -timelineTranslate)) {
            translateTimeline(timelineComponents, -eventLeft + timelineWidth / 2, timelineWidth - timelineTotWidth);
        }
    }

    function translateTimeline(timelineComponents, value, totWidth) {
        var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
        value = (value > 0) ? 0 : value; //only negative translate value
        value = (!(typeof totWidth === 'undefined') && value < totWidth) ? totWidth : value; //do not translate more than timeline width
        setTransformValue(eventsWrapper, 'translateX', value + 'px');
        //update navigation arrows visibility
        (value == 0) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive'): timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
        (value == totWidth) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive'): timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
    }

    function updateFilling(selectedEvent, filling, totWidth) {
        //change .filling-line length according to the selected event
        var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
            eventLeft = eventStyle.getPropertyValue("left"),
            eventWidth = eventStyle.getPropertyValue("width");
        eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', '')) / 2;
        var scaleValue = eventLeft / totWidth;
        setTransformValue(filling.get(0), 'scaleX', scaleValue);
    }

    function setDatePosition(timelineComponents, min) {
        for (i = 0; i < timelineComponents['timelineDates'].length; i++) {
            var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
                distanceNorm = Math.round(distance / timelineComponents['eventsMinLapse']) + 2;
            timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm * min + 'px');
        }
    }

    function setTimelineWidth(timelineComponents, width) {
        var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length - 1]),
            timeSpanNorm = timeSpan / timelineComponents['eventsMinLapse'],
            timeSpanNorm = Math.round(timeSpanNorm) + 4,
            totalWidth = timeSpanNorm * width;
        timelineComponents['eventsWrapper'].css('width', totalWidth + 'px');
        updateFilling(timelineComponents['timelineEvents'].eq(0), timelineComponents['fillingLine'], totalWidth);

        return totalWidth;
    }

    function updateVisibleContent(event, eventsContent) {
        var eventDate = event.data('date'),
            visibleContent = eventsContent.find('.selected'),
            selectedContent = eventsContent.find('[data-date="' + eventDate + '"]'),
            selectedContentHeight = selectedContent.height();

        if (selectedContent.index() > visibleContent.index()) {
            var classEnetering = 'selected enter-right',
                classLeaving = 'leave-left';
        } else {
            var classEnetering = 'selected enter-left',
                classLeaving = 'leave-right';
        }

        selectedContent.attr('class', classEnetering);
        visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {
            visibleContent.removeClass('leave-right leave-left');
            selectedContent.removeClass('enter-left enter-right');
        });
        eventsContent.css('height', selectedContentHeight + 'px');
    }

    function updateOlderEvents(event) {
        event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
    }

    function getTranslateValue(timeline) {
        var timelineStyle = window.getComputedStyle(timeline.get(0), null),
            timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
            timelineStyle.getPropertyValue("-moz-transform") ||
            timelineStyle.getPropertyValue("-ms-transform") ||
            timelineStyle.getPropertyValue("-o-transform") ||
            timelineStyle.getPropertyValue("transform");

        if (timelineTranslate.indexOf('(') >= 0) {
            var timelineTranslate = timelineTranslate.split('(')[1];
            timelineTranslate = timelineTranslate.split(')')[0];
            timelineTranslate = timelineTranslate.split(',');
            var translateValue = timelineTranslate[4];
        } else {
            var translateValue = 0;
        }

        return Number(translateValue);
    }

    function setTransformValue(element, property, value) {
        element.style["-webkit-transform"] = property + "(" + value + ")";
        element.style["-moz-transform"] = property + "(" + value + ")";
        element.style["-ms-transform"] = property + "(" + value + ")";
        element.style["-o-transform"] = property + "(" + value + ")";
        element.style["transform"] = property + "(" + value + ")";
    }

    //based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
    function parseDate(events) {
        var dateArrays = [];
        events.each(function() {
            var dateComp = $(this).data('date').split('/'),
                newDate = new Date(dateComp[2], dateComp[1] - 1, dateComp[0]);
            dateArrays.push(newDate);
        });
        return dateArrays;
    }

    function parseDate2(events) {
        var dateArrays = [];
        events.each(function() {
            var singleDate = $(this),
                dateComp = singleDate.data('date').split('T');
            if (dateComp.length > 1) { //both DD/MM/YEAR and time are provided
                var dayComp = dateComp[0].split('/'),
                    timeComp = dateComp[1].split(':');
            } else if (dateComp[0].indexOf(':') >= 0) { //only time is provide
                var dayComp = ["2000", "0", "0"],
                    timeComp = dateComp[0].split(':');
            } else { //only DD/MM/YEAR
                var dayComp = dateComp[0].split('/'),
                    timeComp = ["0", "0"];
            }
            var newDate = new Date(dayComp[2], dayComp[1] - 1, dayComp[0], timeComp[0], timeComp[1]);
            dateArrays.push(newDate);
        });
        return dateArrays;
    }

    function daydiff(first, second) {
        return Math.round((second - first));
    }

    function minLapse(dates) {
        //determine the minimum distance among events
        var dateDistances = [];
        for (i = 1; i < dates.length; i++) {
            var distance = daydiff(dates[i - 1], dates[i]);
            dateDistances.push(distance);
        }
        return Math.min.apply(null, dateDistances);
    }

    /*
    	How to tell if a DOM element is visible in the current viewport?
    	http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
    */
    function elementInViewport(el) {
        var top = el.offsetTop;
        var left = el.offsetLeft;
        var width = el.offsetWidth;
        var height = el.offsetHeight;

        while (el.offsetParent) {
            el = el.offsetParent;
            top += el.offsetTop;
            left += el.offsetLeft;
        }

        return (
            top < (window.pageYOffset + window.innerHeight) &&
            left < (window.pageXOffset + window.innerWidth) &&
            (top + height) > window.pageYOffset &&
            (left + width) > window.pageXOffset
        );
    }

    function checkMQ() {
        //check if mobile or desktop device
        return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
    }


});

function listar_comisaria() {
    $.ajax({
        url: '../controlador/UsuarioVictima/controlador_asesoria.php',
        type: 'POST',
        data: {},
        beforeSend: function() {
            $("#loading_almacen").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        complete: function() {
            $("#loading_almacen").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        success: function(resp) {
            var cadena_comisaria = "";
            var cadena_juzgado = "";
            var cadena_fiscalia = "";
            var cadena_pericias = "";
            var cadena_medidas = "";


            //if (resp.length >= 0) {
            var data = JSON.parse(resp);

            cadena_comisaria += "<h5 ><b data-lang='instructor'>Instructor: </b>" + data[24] + "</h5>";
            cadena_comisaria += "<h5><b>N° de Oficio a Fiscalía: </b>" + data[1] + "</h5>";
            cadena_comisaria += "<h5><b>N° de Oficio a Juzgado: </b>" + data[2] + "</h5>";
            cadena_comisaria += "<h5 ><b data-lang='riesgo'>Nivel de Riesgo: </b>" + data[3] + "</h5>";
            cadena_comisaria += "<center><button class='btn btn-info' style='padding:0.5px 3px 0.5px 3px'><i class='fa fa-download'></i> <a href='../../../" + data[11] + "' download='Acta_denuncia.pdf'>Copia Simple Acta de Denuncia <br>Verbal / Intervención Policial</a> </button></center>";
            //cadena_comisaria += "<center><button class='btn btn-info' style='padding:0.5px 3px 0.5px 3px' onclick='downloadURI('../../../controlador/institucion/" + data[11] + "', 'Acta_denuncia.pdf');'><i class='fa fa-download'></i> <a>Copia Simple Acta de Denuncia <br>Verbal / Intervención Policial</a> </button></center>";
            $("#listar_comisaria").html(cadena_comisaria);

            cadena_juzgado += "<h5><b data-lang='juez'>Juez: </b>" + data[9] + "</h5>";
            cadena_juzgado += "<h5><b data-lang='juzgad'>Juzgado: </b>" + data[8] + "</h5>";
            cadena_juzgado += "<h5><b data-lang='expediente'>N° de Expediente </b>" + data[7] + "</h5>";
            cadena_juzgado += "<h5><b data-lang='fecha'>Fecha de Registro: </b>" + data[10] + "</h5>";
            cadena_juzgado += "<center><button class='btn btn-info' style='padding:0.5px 3px 0.5px 3px'><i class='fa fa-download'></i> <a href='../../../" + data[12] + "' download='Demanda_electronica.pdf'>Copia de Demanda Electrónica</a> </button></center>";

            $("#listar_juzgado").html(cadena_juzgado);

            cadena_fiscalia += "<h5><b data-lang='fiscal'>Fiscal: </b>" + data[5] + "</h5>";
            cadena_fiscalia += "<h5><b data-lang='fiscali'>Fiscalía: </b>" + data[4] + "</h5>";
            cadena_fiscalia += "<h5><b data-lang='fecha'>Fecha de Registro: </b>" + data[6] + "</h5>";
            $("#listar_fiscalia").html(cadena_fiscalia);

            cadena_pericias += "<center><h5 ><u><b data-lang='periciap'>Pericia Psicológica  </b></u></center>";
            cadena_pericias += "<h5><b data-lang='npericiap'>N° de Pericia Psicológica: </b> " + data[13] + "</h5><hr>";
            cadena_pericias += "<center><h5><u><b data-lang='certificado'>Certificado Médico Legal  </b></u> </center>";
            cadena_pericias += "<h5><b data-lang='ncertificado'>N° de Certificado Médico Legal: </b> " + data[14] + "</h5>";
            cadena_pericias += "<h5><b>Atención Facultativa: </b> " + data[15] + "</h5>";
            cadena_pericias += "<h5><b data-lang='incapacidad'>Incapacidad Médico Legal: </b> " + data[16] + "</h5><hr>";
            cadena_pericias += "<center><h5 ><i class='fa fa-download'></i><u><a style='color:blue' href='../../../" + data[18] + "' download='Informe_psicologico_CEM.pdf'>Informe Psicológico de CEM </a></u></h5></center>";
            cadena_pericias += "<h5><b>N° de Informe Psicológico de CEM: </b> " + data[17] + "</h5><hr>";
            cadena_pericias += "<center><h5><i class='fa fa-download'></i><u><a style='color:blue' href='../../../" + data[20] + "' download='Informe_psicologico_SAU.pdf'>Informe Psicológico de SAU: </a></u></h5></center>";
            cadena_pericias += "<h5><b>N° de Informe Psicológico de SAU: </b> " + data[19] + "</h5><hr>";
            cadena_pericias += "<center><h5><i class='fa fa-download'></i><u><a style='color:blue' href='../../../" + data[22] + "' download='Informe_Social_CEM.pdf'>Informe Social de CEM: </a></u></h5></center>";
            cadena_pericias += "<h5><b>N° de Informe Social de CEM: </b> " + data[21] + "</h5>";
            $("#listar_pericias").html(cadena_pericias);

            cadena_medidas += "<center><h5><i class='fa fa-download'></i><u><a style='color:blue' data-lang='medidasp'href='../../../" + data[22] + "' download='Medidas_proteccion.pdf'>Medidas de protección  </a></u></h5><center>"
            $("#listar_medidas").html(cadena_medidas);

            //}
        },
    });
}

function limpiar_copia_denuncia() {
    $('#txtdni').val("");
    $('#txtmovil').val("");
    $('#txtdireccion').val("");
    $('#txtreferencia').val("");
    //$("#main-content").load("UsuarioVictima/copia_denuncia.php");

}

function copia_denuncia() {
    var dni = $('#txtdni').val();
    var movil = $('#txtmovil').val();
    var direccion = $('#txtdireccion').val();
    var referencia = $('#txtreferencia').val();

    if (dni.length > 0 && movil.length > 0 && direccion.length > 0 && referencia.length > 0) {
        $.ajax({
                url: '../controlador/UsuarioVictima/controlador_copia_denuncia.php',
                type: 'POST',
                data: {
                    dni: dni,
                    movil: movil,
                    direccion: direccion,
                    referencia: referencia
                }
            })
            .success(function() {
                //if (resp > 0) {
                //$('#modal_editar_personal').modal('hide');
                limpiar_copia_denuncia();
                swal("Datos Enviados, en breve se comunicarán con Ud.!", "", "success")
                    .then((value) => {
                        $("#main-content").load("UsuarioVictima/copia_denuncia.php");
                        $('#Modal_mensaje').modal('close');
                    });
                //var dato_buscar = $("#txtbuscar_personal").val();
                //listar_personal_vista(dato_buscar, '1');
                //} else {
                //swal("! Registro no completado!", "", "error");
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

    } else {
        return swal("Falta Llenar Datos", "", "info");
    }
}

var etiq;

function get_etiqueta(palabra) {
    etiq = palabra;
}


function asesoria() {
    var consulta = $('#consulta_alimentos').val();
    var movil = $('#movil_alimentos').val();
    var etiqueta = etiq;

    if (consulta.length > 0 && movil.length > 0) {
        $.ajax({
                url: '../controlador/UsuarioVictima/controlador_seguimiento.php',
                type: 'POST',
                data: {
                    consulta: consulta,
                    movil: movil,
                    etiqueta: etiqueta
                }
            })
            .success(function() {
                //if (resp > 0) {
                //$('#modal_editar_personal').modal('hide');
                //limpiar_copia_denuncia();
                swal("Datos Enviados, en breve se comunicarán con Ud.!", "", "success")
                    .then((value) => {
                        $("#main-content").load("UsuarioVictima/asesoria.php");
                        $('#Modal_mensaje').modal('close');
                    });
                //var dato_buscar = $("#txtbuscar_personal").val();
                //listar_personal_vista(dato_buscar, '1');
                //} else {
                //swal("! Registro no completado!", "", "error");
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

    } else {
        return swal("Falta Llenar Datos", "", "info");
    }
}

function asesoria_psico() {
    var movil = $('#movil_psico').val();
    var etiqueta = etiq;

    if (movil.length > 0) {
        $.ajax({
                url: '../controlador/UsuarioVictima/controlador_seguimiento_psico.php',
                type: 'POST',
                data: {
                    movil: movil,
                    etiqueta: etiqueta
                }
            })
            .success(function() {
                //if (resp > 0) {
                //$('#modal_editar_personal').modal('hide');
                //limpiar_copia_denuncia();
                swal("Datos Enviados, en breve se comunicarán con Ud.!", "", "success")
                    .then((value) => {
                        $("#main-content").load("UsuarioVictima/asesoria.php");
                        $('#Modal_mensaje').modal('close');
                    });
                //var dato_buscar = $("#txtbuscar_personal").val();
                //listar_personal_vista(dato_buscar, '1');
                //} else {
                //swal("! Registro no completado!", "", "error");
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

    } else {
        return swal("Falta Llenar Datos", "", "info");
    }
}


function panic_button() {
    $.ajax({
            url: '../controlador/UsuarioVictima/controlador_panico.php',
            type: 'POST',
            data: {}
        })
        .success(function() {
            //if (resp > 0) {
            //$('#modal_editar_personal').modal('hide');
            //swal("Datos Enviados, mantenga la calma, en breve se comunicarán con Ud.!", "", "success");
            //var dato_buscar = $("#txtbuscar_personal").val();
            //listar_personal_vista(dato_buscar, '1');
            //} else {
            //swal("! Registro no completado!", "", "error");
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

}