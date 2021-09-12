<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">

<div class="contendor_kn">
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h3><b>BOTÓN DE PÁNICO</b></h3></center>
      </div>
      <div class="panel-body">   
        <div style="text-align: center;" align="center">
          <img class="imagen0" style="text-align: center;" onclick="abrirmodaladministrativo()" align="center" src="_recursos/img/botonp.png"> 
        </div> 
      </div>
    </div>

    <div class="">
      <div style="text-align: center;" align="center">
        <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/ind_panico.png">
      </div>  
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modal_editar_adminsitrador" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><label> </label></h4>
         </div>
        <div class="modal-body">
          <div class="contendor_kn">
            <div class="panel panel-default">
              <div class="panel-body">
              <div style="text-align: center;" align="center">
                <img class="imagen" style="text-align: center;" align="center" src="_recursos/img/polimsm.png">
              </div> 
              </div>         
            </div>
          </div>  
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-info pull-right" data-dismiss="modal"></i><strong> Entendido</strong></button>
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
      color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;
    }
    .modal-open .select2-container--open {
      z-index: 999999 !important; width:100% !important; 
    }
</style>
<script type="text/javascript">
  traer_administrador();
    $(document).on('submit', '#update-form-administrador', function() { 
      var data = $(this).serialize(); 
      $.ajax({  
        type : 'POST',
        mimeType: "multipart/form-data",
        url  : '',
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(resp) {
          $("#modal_editar_adminsitrador").modal('hide');
          traer_administrador();
          document.getElementById("update-form-administrador").reset();
          if(resp>0){
            swal("Datos Actualizados","","success")
            .then ( ( value ) =>  { 
              document.getElementById("update-form-administrador").reset();
              traer_administrador();
            } ) ;
          }else{
            swal("Lo sentimos los datos no fueron registrados","","error")
            .then ( ( value ) =>  { 
              document.getElementById("update-form-administrador").reset();
              traer_administrador();
            } ) ;
          }
          traer_administrador();
        }  
      });
      return false;
    }); 
</script>
