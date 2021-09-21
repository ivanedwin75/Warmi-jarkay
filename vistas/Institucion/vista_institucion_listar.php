
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
        <label>COMISARIA / DENUNCIA</label>
        <div class="contendor_kn">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-3" style="text-align: right;" >
                <input type="text" id="txtid_denuncia" hidden >
                <label style = "padding-top: 7px; ">Instructor a cargo </label>
                <label style = "padding-top: 7px;">Nro de Oficio a Juzgado </label>
                <label style = "padding-top: 7px;">Nro de Oficio a fiscalia </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="txtinstructor" placeholder="Ingrese CIP del efectivo" maxlength="8">
                <input type="text" class="form-control" id="txtofijuzgado" placeholder="Ingrese Nro de oficio a Juzgado" maxlength="35">
                <input type="text" class="form-control" id="txtofifiscalia" placeholder="Ingrese Nro de oficio a fiscalia" maxlength="35">
              </div>

              <div class="col-sm-3" style="text-align: right;">
                <label style = "padding-top: 7px;">Nivel de riesgo </label>
                <label style = "padding-top: 7px;">Cargar copia de Acta de Denuncia Verbal / Acta de Intervención Policial </label>
              </div>
              <div class="col-sm-2">
                <select id="niv_riesgo" style="width: 100%" class="form-control select2">
                  <option value="Sin Riesgo" >Sin Riesgo</option>
                  <option value="Leve" >Leve</option>
                  <option value="Moderado" >Moderado</option>
                  <option value="Severo 1" >Severo 1</option>
                  <option value="Severo 2" >Severo 2</option>
                  <option value="Severo 3" >Severo 3</option>
                </select>
                
                <div class="row" style = "padding-top: 10px; padding-bottom:7px;">
                  <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <label >JUZGADO</label>
        <div class="contendor_kn">
          <div class="panel panel-default" >
            <div class="panel-body">
              <div class="col-sm-3" style="text-align: right;">
                <label style = "padding-top: 7px;">Juez a cargo </label><br>
                <label style = "padding-top: 7px;">Juzgado</label><br>
                <label style = "padding-top: 7px;">N° de Expediente</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtjuez" placeholder="Ingrese Nombre de Juez" maxlength="100">
              </div>

              <div class="col-sm-3" style = "padding-top: 3px;">
                <select id="txtjuzgado" style="width: 100%" class="form-control select2">
                  <option value="1° JUZGADO DE FAMILIA SUBESPEC. LEY 30364 - SEDE ANEXA PUNO">1er Juzgado de familia</option>
                  <option value="2° JUZGADO DE FAMILIA - SEDE ANEXA PUNO" style="color:black">2do Juzgado de familia</option>
                </select>

                <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Expediente">
              </div>

              <div class="col-sm-2" style="text-align: right;">
                <label style = "padding-top: 12px;">Fecha Registro</label>
                <label style = "padding-top: 12px;">Cargar copia</label>
              </div>

              <div class="col-sm-3" style = "padding-top: 3px;">
                <div class=" input-group" style = "padding-top: 3px;">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" style="padding: 0px 12px;background-color: #FFFFFF;font-weight:bold;" id="txtf_juzgado"  class="form-control"  >
                </div>
                <div class="row" style = "padding-top: 10px; padding-bottom:7px;">
                  <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                </div>
              </div>
              
            </div>  
          </div>
        </div>
      
        <label >FISCALIA</label>
        <div class="contendor_kn">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-3" style="text-align: right;">
                <label style = "padding-top: 7px;">Fiscal a cargo </label><br>
                <label style = "padding-top: 7px;">Fiscalia</label><br>
                <label style = "padding-top: 7px;">Fecha Registro</label>
              </div>
              
              <div class="col-sm-9">
                <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtfiscal" placeholder="Ingrese Nombre completo de fiscal" maxlength="100">
              </div>
              <div class="col-sm-4" style = "padding-top: 3px;">
                <select id="txtfiscalia" style="width: 100%" class="form-control select2">
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
        <div class="contendor_kn">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-12" style="text-align: right;">
                <div class="row" >
                  <div class="col-sm-3">
                    <label style = "padding-top: 7px;padding-bottom:3px;">Pericia Psicológica</label>
                    <label style = "padding-top: 7px;padding-bottom:3px;">Certificado Médico Legal</label>
                    <label style = "padding-top: 7px;padding-bottom:3px;">Informe Psicológico de CEM </label>
                    <label style = "padding-top: 7px;padding-bottom:3px;">Informe Psicológico de SAU</label>
                    <label style = "padding-top: 7px;padding-bottom:3px;">Informe Social de CEM</label>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Pericia Psicológica" >
                    <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Certificado Médico Legal" >
                    <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Informe Psicológico de CEM" >
                    <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Informe Psicológico de SAU" >
                    <input type="text" class="form-control" id="" placeholder="Ingrese Nro de Informe Social de CEM" >
                  </div>

                  <div class="col-sm-4" >
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                    </div>
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                    </div>
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                    </div>
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
                    </div>
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
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
                    <div class="row" style = "padding-top: 9px;">
                      <div class="col-sm-9"><input type="file" name="id_archivo" class="file-upload-default"></div>
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
          <button  class="btn btn-success" onclick="Editar_denuncia()"><i class="fa fa-check"></i>&nbsp;<b>Guardar</b></button>&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;<b>Cancelar</b></button>
        </div> 
    </div>
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