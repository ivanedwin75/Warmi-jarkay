
<script type="text/javascript" src="_recursos/js/console_institucion.js"></script>
<div class="contendor_kn">
  <div class="panel panel-default">
    <div class="panel-heading"> 
        <center><h3><b>BUSCAR EXPEDIENTES</b></h3></center>         
    </div>
    <div class="panel-body">
        <div class="col-md-12"> 
          <div class=" input-group">
            <input id="txt_institucion_vista" type="text" class="form-control" onkeypress="return soloNumeros(event)"  placeholder="Ingrese el DNI">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
          </div>
          <br>
          <!--
          <div class=" input-group">
            <input id="txt_institucion_vista_exp" type="text" class="form-control" placeholder="Ingrese N° de expediente">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
          </div>
        </div>
        
        <div class="col-md-2">
           <button class="btn btn-info" onclick="cargar_contenido('main-content','Institucion/vista_institucion_registrar.php');"><i class="fa fa-file-text" ></i> &nbsp;&nbsp;<strong>Nuevo Registro</strong></button>  
        </div>
-->
        <div class="box-body table-responsive" style="text-align: center;">
        	
            <div id="listar_institucion_tabla" class=" icon-loading">
              <i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
              <div id="nodatos"></div>
            </div>
            <p id="paginador_institucion_tabla" style="text-align:right" class="mi_paginador"></p>
        </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL -->
<script type="text/javascript">listar_institucion_vista("","1");</script>
<!--Fin Modal-->

<style type="text/css">
	.contendor_kn{
		padding: 10px;
	}
</style>
<div class="modal fade bs-example-modal-lg" id="modal_editar_denuncia">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style = "text-align:center;"><b>DATOS DE LA DENUNCIA</b></h4>
      </div>
      <div class="modal-body">
      <form form action="" method="post" enctype="multipart/form-data">
        <label>COMISARIA / DENUNCIA</label>
        <div class="contendor_kn" style = "padding: 1px 1px 1px 0px; ">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-2" style="text-align: right;" >
                <input type="text" id="txtid_denuncia" name="txtid_denuncia" hidden >
                <label style = "padding-top: 10px; font-size:12.5px">Instructor a cargo </label>
                <label style = "padding-top: 10px; font-size:12.5px">N° de Oficio a Juzgado </label>
                <label style = "padding-top: 10px; font-size:12.5px">N° de Oficio a fiscalia </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="txtinstructor" name="txtinstructor" placeholder="Ingrese CIP del efectivo" maxlength="8">
                <input type="text" class="form-control" id="txtofijuzgado" name="txtofijuzgado" placeholder="Ingrese N° de oficio a Juzgado" maxlength="35">
                <input type="text" class="form-control" id="txtofifiscalia" name="txtofifiscalia" placeholder="Ingrese N° de oficio a fiscalia" maxlength="35">
              </div>

              <div class="col-sm-2" style="text-align: right;">
                <label style = "padding-top: 7px;">Nivel de riesgo </label>
                <label style = "padding-top: 7px;">Cargar copia de Acta de Denuncia Verbal / Intervención Policial </label>
              </div>
              <div class="col-sm-4">
                <select id="niv_riesgo" name="niv_riesgo" style="width: 100%" class="form-control select2">
                  <option value="Sin Riesgo" >Sin Riesgo</option>
                  <option value="Leve" >Leve</option>
                  <option value="Moderado" >Moderado</option>
                  <option value="Severo 1" >Severo 1</option>
                  <option value="Severo 2" >Severo 2</option>
                  <option value="Severo 3" >Severo 3</option>
                </select>
                
                <div class="input-group" style="padding-top:15px">
                  <label class="input-group-btn">
                  <span class="btn btn-info btn-file">
                  <i class="fa fa-upload"></i><input class="hidden" name="arch_den_scan" id="arch_den_scan" type="file" >
                  </span>
                  </label>
                  <input class="form-control" id="txtden_scan" readonly="readonly" type="text">
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <label >JUZGADO</label>
        <div class="contendor_kn" style = "padding: 1px 1px 1px 0px; ">
          <div class="panel panel-default" >
            <div class="panel-body">
              <div class="col-sm-2" style="text-align: right;">
                <label style = "padding-top: 9px;">Juez a cargo </label><br>
                <label style = "padding-top: 9px;">Juzgado</label><br>
                <label style = "padding-top: 9px;">N° de Expediente</label>
              </div>
              <div class="col-sm-10">
                <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtjuez" name="txtjuez" placeholder="Ingrese Nombre de Juez" maxlength="100">
              </div>

              <div class="col-sm-4" style = "padding-top: 6px; ">
                <select id="txtjuzgado" name="txtjuzgado" style="width: 100%" class="form-control select2">
                  <option value="1° JUZGADO DE FAMILIA SUBESPEC. LEY 30364 - SEDE ANEXA PUNO">1er Juzgado de familia</option>
                  <option value="2° JUZGADO DE FAMILIA - SEDE ANEXA PUNO" >2do Juzgado de familia</option>
                </select>

                <input type="text"  class="form-control" id="txtexp_juzgado" name="txtexp_juzgado" placeholder="Ingrese N° de Expediente">
              </div>

              <div class="col-sm-2" style="text-align: right;">
                <label style = "padding-top: 12px;">Fecha Registro</label>
                <label style = "padding-top: 10px;">Cargar demanda electrónica</label>
              </div>

              <div class="col-sm-4" style = "padding-top: 3px;">
                <div class=" input-group" style = "padding-top: 3px;">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" style="padding: 0px 12px;background-color: #FFFFFF;font-weight:bold;" id="txtf_juzgado" name="txtf_juzgado" class="form-control"  >
                </div>
                
                <div class="input-group" style="padding-top:10px">
                  <label class="input-group-btn">
                  <span class="btn btn-info btn-file">
                  <i class="fa fa-upload"></i><input class="hidden" id="arch_dem_elec" name="arch_dem_elec" type="file" >
                  </span>
                  </label>
                  <input class="form-control" id="txtdem_elec" readonly="readonly" name="banner_captura" type="text" value="">
                </div>
              
            </div>  
          </div>
        </div>
      
        <label >FISCALIA</label>
        <div class="contendor_kn" style = "padding: 1px 1px 1px 0px; ">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-2" style="text-align: right;">
                <label style = "padding-top: 7px;">Fiscal a cargo </label><br>
                <label style = "padding-top: 7px;">Fiscalia</label><br>
                <label style = "padding-top: 7px;">Fecha Registro</label>
              </div>
              
              <div class="col-sm-10">
                <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtfiscal" name="txtfiscal" placeholder="Ingrese Nombre completo de fiscal" maxlength="100">
              </div>
              <div class="col-sm-4" style = "padding-top: 3px;">
                <select id="txtfiscalia" name="txtfiscalia" style="width: 100%" class="form-control select2">
                  <option value="Primera Fiscalía Provincial Civil y Familia de Puno" >1era FPPC - Puno</option>
                  <option value="Segunda Fiscalía Provincial Penal Corporativa de Puno" >2da FPPC - Puno</option>
                </select>
              
                <div class=" input-group" style = "padding-top: 3px;">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" style="padding: 0px 12px;background-color: #FFFFFF;font-weight:bold;" id="txtf_fiscalia"  class="form-control"  >
                </div>
              </div>

        
            </div>
          </div>
        </div>


        <label >PERICIAS</label>
        <div class="contendor_kn" style = "padding: 1px 1px 1px 0px; ">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-12" style="text-align: center;">
                <div class="row" >
                  <div class="col-sm-3" >
                    <label style = "padding-top: 7px;padding-bottom:3px;">Pericia Psicológica</label>
                    <!--<input type="text" class="form-control" id="" placeholder="Ingrese N° de Pericia Psicológica" >-->
                    <textarea type="text" class="form-control" name="Per_psico" id="Per_psico" placeholder="Ingrese N° de Pericia Psicológica" ></textarea>
                  </div>

                  <div class="col-sm-3" style="border-right: 1px solid white; border-left: 1px solid white;">
                    <label style = "padding-top: 7px;padding-bottom:3px;">Certificado Médico Legal</label>
                    <textarea type="text" class="form-control" name="certi_med" id="certi_med" placeholder="Ingrese N° de Certificado Médico Legal" ></textarea>
                    
                    <label style = "padding-top: 7px;padding-bottom:3px;">Atención Facultativa</label>
                    <input type="text" class="form-control" name="at_facultativa" id="at_facultativa" placeholder="Ingrese N° de Atención Facultativa" >

                    <label style = "padding-top: 7px;padding-bottom:3px;">Incapacidad Médico Legal</label>
                    <input type="text" class="form-control" name="incap_medico" id="incap_medico" placeholder="Ingrese N° de Incapacidad Médico Legal" >
                  </div>

                  <div class="col-sm-3" style="border-right: 1px solid white;">
                    <label style = "padding-top: 7px;padding-bottom:3px;">Informe Psicológico de CEM </label>
                    <textarea type="text" class="form-control" name="CEM_label" id="CEM_label" placeholder="Ingrese N° de Informe Psicológico de CEM" ></textarea>
                    
                    <div class="input-group">
                      <label class="input-group-btn">
                      <span class="btn btn-info btn-file">
                      <i class="fa fa-upload"></i><input class="hidden" id="arch_cem" name="arch_cem" type="file">
                      </span>
                      </label>
                      <input class="form-control" id="CEM" readonly="readonly" name="CEM" type="text">
                    </div>
                    
                  </div>

                  <div class="col-sm-3 " style="border-left: 1px solid white;">
                    <label style = "padding-top: 7px;">Informe Psicológico de SAU</label>
                    <textarea type="text" class="form-control" name="SAW_label" id="SAW_label" placeholder="Ingrese N° de Informe Psicológico de SAU" ></textarea>
                    
                    <div class="input-group">
                      <label class="input-group-btn">
                      <span class="btn btn-info btn-file">
                      <i class="fa fa-upload"></i><input class="hidden" id="arch_saw" name="arch_saw" type="file">
                      </span>
                      </label>
                      <input class="form-control" id="SAW" readonly="readonly" name="SAW" type="text" value="">
                    </div>

                    <hr>

                    <label style = "">Informe Social de CEM</label>
                    <textarea type="text" class="form-control" name="Social_CEM_label" id="Social_CEM_label" placeholder="Ingrese N° de Informe Social de CEM" ></textarea>
                    
                    <div class="input-group">
                      <label class="input-group-btn">
                      <span class="btn btn-info btn-file">
                      <i class="fa fa-upload"></i><input class="hidden" id="arch_social_cem" name="arch_social_cem" type="file">
                      </span>
                      </label>
                      <input class="form-control" id="Social_CEM" readonly="readonly" name="Social_CEM" type="text">
                    </div>
                  </div>
                  <!--<div class="col-sm-2"><button id="btn_cargar_pericias" type="button" class="btn btn-primary"><strong>Cargar</strong></button></div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

        <label style = "color: black">MEDIDAS</label>
        <div class="contendor_kn">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-12" style="text-align: right;">
                <div class="row" style = "padding-top: 10px; padding-bottom:7px;">
                  <div class="col-sm-3">
                    <label style = "padding-top: 7px;">Medidas de proteccion</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <label class="input-group-btn">
                      <span class="btn btn-info btn-file">
                      <i class="fa fa-upload"></i><input class="hidden" id="arch_med_prot" name="arch_med_prot" type="file">
                      </span>
                      </label>
                      <input class="form-control" id="txtmed_prot" name="txtmed_prot" readonly="readonly" name="banner_captura" type="text" value="">
                    </div>
                  </div>
                  
                  <!--<div class="col-sm-2"><button id="btn_cargar_medidas" type="button" class="btn btn-primary"><strong>Cargar</strong></button></div>-->
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div> 
        <div class="modal-footer">
          <!--<progress value="0" max="100" class="progress" id="progreso">0%</progress>
          <label for="" id="etiqueta">0%</label><br>
                -->
          <button type="submit" class="btn btn-success" onclick="Editar_denuncia()"><i class="fa fa-check"></i>&nbsp;<b>Guardar</b></button>&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;<b>Cancelar</b></button>
        </div> 
    </div>
    </form>
  </div>   
</div>
<script type="text/javascript">
	$("#txt_institucion_vista").keyup(function(){
		var dato_buscar = $("#txt_institucion_vista").val();
		listar_institucion_vista(dato_buscar,'1');
	});

</script>
<script>
    $(function () {
        $('.select2').select2();
    })
</script>  
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function soloNumeros(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
            
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
<script>
  $(document).on('change','.btn-file :file',function(){
  var input = $(this);
  var numFiles = input.get(0).files ? input.get(0).files.length : 1;
  var label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
  input.trigger('fileselect',[numFiles,label]);
});
$(document).ready(function(){
  $('.btn-file :file').on('fileselect',function(event,numFiles,label){
    var input = $(this).parents('.input-group').find(':text');
    var log = numFiles > 1 ? numFiles + ' files selected' : label;
    if(input.length){ input.val(log); }else{ if (log) alert(log); }
  });
});
</script>