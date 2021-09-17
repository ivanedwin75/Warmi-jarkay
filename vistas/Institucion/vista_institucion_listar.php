
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
        <h4 class="modal-title" id="myModalLabel" style = "text-align:center; color: black;"><b>DATOS DE LA DENUNCIA</b></h4>
      </div>
      <div class="modal-body">
        <label style = "color: black">COMISARIA / DENUNCIA</label>
        <div class="panel-body">
          <div class="col-sm-3">
            <input type="text" id="txtid_denuncia" hidden >
            <br>
            <label style = "color: black">Instructor a cargo </label>
            <label style = "color: black">Nro de Oficio a Juzgado </label>
            <label style = "color: black">Nro de Oficio a fiscalia </label>
          </div>

          <div class="col-sm-3">
            <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="txtinstructor" placeholder="Ingrese DNI del efectivo" maxlength="8">
            <input type="text" class="form-control" id="txtofijuzgado" placeholder="Ingrese Nro de oficio a Juzgado" maxlength="35">
            <input type="text" class="form-control" id="txtofifiscalia" placeholder="Ingrese Nro de oficio a fiscalia" maxlength="35">
          </div>

          <div class="col-sm-3">
            <label style = "color: black">Nivel de riesgo </label>
            <label style = "color: black">Cargar copia simple de denuncia </label>
          </div>
          <div class="col-sm-3">
            <select id="niv_riesgo" style="width: 100%" class="form-control select2">
              <option value="1" style="color:black">1</option>
              <option value="2" style="color:black">2</option>
              <option value="3" style="color:black">3</option>
              <option value="4" style="color:black">4</option>
              <option value="5" style="color:black">5</option>
            </select>
            
            <div class="row">
              <div class="col-6 col-md-6"><input type="file" name="id_archivo" class="file-upload-default"></div>
              <div class="col-6 col-md-6"><button id="btn_cargardenuncia" type="button" class="btn btn-primary"><strong>Cargar</strong></button></div>
            </div>
            
            <input id="txtden_scan" type="text" class="form-control file-upload-info" disabled placeholder="Seleccionar Documento">
          </div>
        </div>
      


        <label style = "color: black">FISCALIA</label>
        <div class="panel-body">
          <div class="col-sm-3">
            <label style = "color: black">Fiscal a cargo </label>
          </div>

          <div class="col-sm-9">
            <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtfiscal" placeholder="Ingrese Nombre completo de fiscal" maxlength="100">
          </div>

          <div class="col-sm-3">
            <label style = "color: black">Nro de Expediente </label>
          </div>

          <div class="col-sm-3">
            <input type="text" class="form-control" id="txtexp_fiscalia" placeholder="Ingrese Nro Expediente" maxlength="8">
          </div>

          <div class="col-sm-3">
            <label style = "color: black">Fiscalia</label>
          </div>

          <div class="col-sm-3">
            <select id="txtfiscalia" style="width: 100%" class="form-control select2">
              <option value="Primera Fiscalía Provincial Civil y Familia de Puno" style="color:black">!era FPPC - Puno</option>
              <option value="Segunda Fiscalía Provincial Penal Corporativa de Puno" style="color:black">2da FPPC - Puno</option>
            </select>
          </div>
          <div class="col-sm-6">
                <label>Fecha Registro</label>
                <div class=" input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" style="padding: 0px 12px;background-color: #FFFFFF;font-weight:bold;" id="txtf_fiscalia"  class="form-control"  >
                </div><br>
            </div>
        </div>

        <label style = "color: black">JUZGADO</label>
        <div class="panel-body">
          <div class="col-sm-3">
            <label style = "color: black">Juez a cargo </label>
          </div>

          <div class="col-sm-9">
            <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtjuez" placeholder="Ingrese Nombre de Juez" maxlength="100">
          </div>

          <div class="col-sm-3">
            <label style = "color: black">Nro de Expediente </label>
          </div>

          <div class="col-sm-3">
            <input type="text" class="form-control" id="txtexp_juzgado" placeholder="Ingrese Nro Expediente" maxlength="8">
          </div>

          <div class="col-sm-3">
            <label style = "color: black; text-align=right;">Juzgado</label>
          </div>

          <div class="col-sm-3">
            <select id="txtjuzgado" style="width: 100%" class="form-control select2">
              <option value="1° JUZGADO DE FAMILIA SUBESPEC. LEY 30364 - SEDE ANEXA PUNO" style="color:black">!er Juzgado de familia</option>
              <option value="2° JUZGADO DE FAMILIA - SEDE ANEXA PUNO" style="color:black">2do Juzgado de familia</option>
            </select>
          </div>
          <div class="col-sm-6">
                <label>Fecha Registro</label>
                <div class=" input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" style="padding: 0px 12px;background-color: #FFFFFF;font-weight:bold;" id="txtf_juzgado"  class="form-control"  >
                </div><br>
            </div>
        </div>  

        <label style = "color: black">PERICIAS</label>
        <div class="panel-body">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-3"><label style = "color: black">Pericia Psicologica</label></div>
              <div class="col-sm-3"><input id="txtdem_elec" type="text" class="form-control file-upload-info" disabled placeholder="Seleccionar Documento"></div>
              <div class="col-sm-3"><input type="file" name="id_archivo" class="file-upload-default"></div>
              <div class="col-sm-3"><button id="btn_cargar_pericias" type="button" class="btn btn-primary"><strong>Cargar</strong></button></div>
            </div>
          </div>
        </div>


        <label style = "color: black">MEDIDAS</label>
        <div class="panel-body">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-3"><label style = "color: black">Medidas de proteccion</label></div>
              <div class="col-sm-3"><input type="text" class="form-control file-upload-info" disabled placeholder="Seleccionar Documento"></div>
              <div class="col-sm-3"><input id="txtmed_prot" type="file" name="id_archivo" class="file-upload-default"></div>
              <div class="col-sm-3"><button id="btn_cargar_medidas" type="button" class="btn btn-primary"><strong>Cargar</strong></button></div>
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