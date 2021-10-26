<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">

<div class="contendor_kn">
    <div class="panel panel-default">
        <div class="panel-heading">
          <!--<button class="btn btn-light" style="float: right; border-color: gray;" onclick="cargar_contenido('main-content','UsuarioVictima/asesoria.php');" ><strong> Español</strong></button>
          <button class="btn btn-light" style="float: right; border-color: gray;" onclick="cargar_contenido('main-content','UsuarioVictima/asesoria_q.php');"  ><strong> Quechua</strong></button>
          <button class="btn btn-light" style="float: right; border-color: gray;" onclick="cargar_contenido('main-content','UsuarioVictima/asesoria_a.php');"  ><strong> Aymara</strong></button><br>-->
          <center><h3><b data-lang="asesoria">ASESORÍA </b></h3></center> 
          <center><label data-lang="elige">¿Qué tipo de Asesoría Necesita?</label></center>
        </div> 
    </div>
</div>
<div class="contendor_kn">
    <div class="panel panel-default">
      <div class="panel-body">
        <center><label data-lang="legal">Asesoría Legal</label></center>
            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button class="btn btn-success" data-toggle="modal" onclick="get_etiqueta('Proceso de Alimentos')" data-target="#Modal"><strong data-lang="alimentos"> Proceso de Alimentos</strong></button>
                </div>
            </div>   
                    
            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button class="btn btn-success" data-toggle="modal" onclick="get_etiqueta('Tenencia de menores')" data-target="#Modal2"><strong data-lang="tenencia"> Tenencia de Menores</strong></button>
                </div>
            </div>
    </div>
</div>

    <div class="panel panel-default"> 
      <div class="panel-body"> 
        <center><label >Orientación y Consejería Psicológica</label></center>
            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button class="btn btn-success"  data-toggle="modal" onclick="get_etiqueta('Crisis emocional')" data-target="#Modal3"><strong data-lang="pena"> Crisis Emocional</strong></button>
                </div>
            </div>   
                    
            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button class="btn btn-success" data-toggle="modal" onclick="get_etiqueta('Ansiedad o miedo a lo que pueda pasar')" data-target="#Modal3"><strong data-lang="violacion"> Ansiedad o Miedo <br>a lo que pueda pasar</strong></button>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button class="btn btn-success" data-toggle="modal" onclick="get_etiqueta('Otros problemas')" data-target="#Modal3"><strong data-lang=""> Otros</strong></button>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div style="text-align: center;" align="center">
            <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/ayuda.png">
        </div>
    </div>
      
<!-- Modal1 -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel"><center><b data-lang="alimentos">Proceso de Alimentos</b></center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/procesoa.png">
                </div><br>
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <div class="modal-title">
            <center><label data-lang="entendio">¿Resolvimos su duda?</label></center></div>
        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#Modal5" data-lang="no">No</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" data-lang="si">Si</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel1"><center><b data-lang="tenencia">Tenencia de Menores</b></center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/tenenciam.png">
                </div><br>
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <div class="modal-title">
            <center><label data-lang="entendio">¿Resolvimos su duda?</label></center></div>
        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#Modal5" data-lang="no">No</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" data-lang="si">Si</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal3 psicológico-->
<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="ModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel5"><center><b data-lang="asesori">Asesoría Gratuita</b></center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
              <div class="form-group col-lg-12 col-md-12 col-xs-12">
                <label data-lang="celular">Número de Celular</label>
                <input id="movil_psico"  type="text" style="background-color: #FFFFFF"  placeholder="Ingrese nro de celular" class="form-control" >
              </div>   
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/llamada.png">
                </div> 
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" data-lang="cancelar">Cancelar</button>
        <button type="button" class="btn btn-info" data-lang="enviar" onclick="asesoria_psico()" data-dismiss="modal">Enviar</button>
      </div>
    </div>
  </div>
</div>
<!-- en caso seleccione no -->
<div class="modal fade" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel5"><center><b data-lang="asesori">Asesoría gratuita</b></center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
              <div class="col-md-12 col-lg-12 col-xs-12"> 
                <div class="col-sm-12">
                    <label for="" data-lang="escribir">Escriba su consulta </label>
                    <textarea type="text" class="form-control" id="consulta_alimentos" placeholder="" ></textarea>
                    <label data-lang="celular">Número de Celular</label>
                    <input id="movil_alimentos"  type="text" style="background-color: #FFFFFF"  placeholder="Ingrese nro de celular" class="form-control" >
                    <br>
                </div><br>
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/mensaje.png">
                </div> 
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"data-lang="cancelar">Cancelar</button>
        <button type="button" class="btn btn-info" onclick="asesoria()" data-dismiss="modal" data-lang="entendido">Entendido</button>
      </div>
    </div>
  </div>
</div>





    


<script type="text/javascript">
</script>
<script type="text/javascript" src="_recursos/js/consola_usu_victima.js"></script>

<style type="text/css">
  .contendor_kn{
    padding: 10px;
  }
</style>
<style type="text/css">
    label{
      font-weight:bold;
    }
    .select2{
      font-weight:bold;
      text-align-last:center;
    }
    button{
    font-weight:bold;
    
    }
    select{
       font-weight:bold;
      text-align-last:center;
    }
    .select2-container--default.select2-container--disabled .select2-selection--single{
      color: rgb(25,25,51); background-color: rgb(255,255,255);solid: 5px;
    }
    .modal-open .select2-container--open {
      z-index: 999999 !important; width:100% !important; 
    }
</style>

