<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">
<div class="contendor_kn">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3><b>REGISTRO DEL PERSONAL</b></h3></center>   
    </div>
    <div class="panel-body">     
          <div class="col-md-12 col-lg-12 col-xs-12"> 
            <div class="col-sm-6">
                <label >Apellido Paterno</label>
                <input type="text" class="form-control" id="txtapellidopaterno" onkeypress="return soloLetras(event)"    style="background-color: #FFFFFF"    placeholder="Ingrese Apellido Paterno">
                <br>
            </div>
            <div class="col-sm-6">
                <label >Apellido Materno</label>
                <input type="text" class="form-control" id="txtapellidomaterno" onkeypress="return soloLetras(event)" style="background-color: #FFFFFF" placeholder="Ingrese Apellido Materno">
                <br>
            </div>
            <div class="col-sm-12">
                <label>Nombres</label>
                <input id="txtnombre"  onkeypress="return soloLetras(event)"  type="text" style="background-color: #FFFFFF"  placeholder="Ingrese nombre de la persona" class="form-control" >
                <br>
            </div>
            <div class="col-sm-4">
                <label >Grado</label>
                <input type="text" class="form-control" id="txtcargo" maxlength="8" style="background-color: #FFFFFF" placeholder="Ingrese el Grado">
                <br>
            </div>
            
            <div class="col-sm-4">
                <label >CIP</label>
                <input type="text" class="form-control" id="txtdni" onkeypress="return soloNumeros(event)"   maxlength="8" style="background-color: #FFFFFF" placeholder="Ingrese CIP">
                <br>
            </div>
            
            <div class="col-sm-4">
                <label >Celular</label>
                <input type="text" class="form-control" id="txtmovil" onkeypress="return soloNumeros(event)"   maxlength="9" style="background-color: #FFFFFF" placeholder="Ingrese Nº Celular">
                <br>
            </div>
          </div>   
          <div class="col-md-12 col-lg-12 col-xs-12">   
            <div class="col-sm-6">
                <label >Email</label>
                <input type="email" class="form-control" required="" id="txtemail" placeholder="Ingrese Email">
                <br>
            </div>
             
          </div>            
          <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
            <div class="col-md-12">
              <br><button class="btn btn-success" onclick="revisar_dni_personal()"><strong> Registrar Personal</strong></button><br><br>
            </div>
          </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="_recursos/js/consola_personal.js"></script>

<script type="text/javascript">
  Listar_tipousuario_combo();
</script>

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
      color: rgb(25,25,51); background-color: rgb(255,255,255);
    }
    .modal-open .select2-container--open {
      z-index: 999999 !important; width:100%; 
    }
</style>
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
</script>
<script>
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
      $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
      });
</script>
<script>
    $(function () {
        $('.select2').select2();
    })
</script>