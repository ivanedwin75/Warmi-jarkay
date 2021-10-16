<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">

<div class="contendor_kn">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center><h4><b data-lang="copia">SOLICITAR COPIA GRATUITA DE DENUNCIA</b></h4></center>
        </div> 
        <div class="panel-body">     
          <div class="col-md-12 col-lg-12 col-xs-12"> 
                <div class="col-sm-6">
                    <h5><b>DNI</b></h5>
                    <em><h6 data-lang="entrega">(La entrega se realizará solo al denunciante)</h6></em>
                    <input type="text" class="form-control" id="txtdni" onkeypress="return soloNumeros(event)"   maxlength="8" style="background-color: #FFFFFF" placeholder="Ingrese su DNI">
                    
                </div>
                <div class="col-sm-6">
                    <h5><b data-lang="celular">Celular</b></h5>
                    <em><h6>.</h6></em>
                    <input type="text"class="form-control" id="txtmovil"  onkeypress="return soloNumeros(event)" placeholder="Ingrese su número de celular" maxlength="9">
                    
                </div>          
                <div class="col-sm-6">
                    <h5><b data-lang="direccion">Dirección  </b><button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target="#Modal_mapa"> <i class="fa fa-map-marker icon text-info-lter"></i> </button></h5>
                    <em><h6 data-lang="deber">(Debe encontrarse dentro de la jurisdicción de Huáscar)</h6></em>
                    <input type="text" class="form-control" id="txtdireccion" style="background-color: #FFFFFF" placeholder="Ingrese su Direccion">
                    
                </div>
                <div class="col-sm-6">
                    <h5><b data-lang="referencia">Referencia  </b><button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target="#Modal_mapa"> <i class="fa fa-map-marker icon text-info-lter"></i> </button></h5> 
                    <em><h6 data-lang="deber">(Debe encontrarse dentro de la jurisdicción de Huáscar)</h6></em>
                    <input type="text" class="form-control" id="txtreferencia" style="background-color: #FFFFFF" placeholder="Ingrese una Referencia">
                    
                </div>
            </div>   
                    
            <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                <div class="col-md-12">
                <br><button type="submit" class="btn btn-success" onclick="Enviar_datos()" data-toggle="modal" data-target="#Modal_mensaje"><strong data-lang="solicitar">  Solicitar  </strong></button><br>
                </div>
            </div>
        </div>
    </div>
</div>
        

    <div class="">
        <div style="text-align: center;" align="center">
            <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/copia.png">
        </div> 
    </div>
      
<!-- Modal Mapa -->
<div class="modal fade" id="Modal_mapa" tabindex="-1" role="dialog" aria-labelledby="ModalLabel_mapa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="Modal-title" id="ModalLabel_mapa"><center><b data-lang="mapa"> Mapa de la Jurisdicción de Huáscar </b></center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/mapah.jpg">
                </div>
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal" data-lang="cerrar">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal mensaje -->
<div class="modal fade" id="Modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="ModalLabel_mensaje" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
                <div style="text-align: center;" align="center">
                    <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/copia_m.png">
                </div><br>
              </div>         
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal" data-lang="cancelar"> Cancelar </button>
        <button class="btn btn-success" onclick=""><strong data-lang="solicitar">  Solicitar  </strong></button>
      </div>
    </div>
  </div>
</div>
 

<script type="text/javascript">
</script>
<script type="text/javascript" src="_recursos/js/consola_victima.js"></script>

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

