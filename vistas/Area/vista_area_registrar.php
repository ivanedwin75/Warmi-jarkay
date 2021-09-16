<script type="text/javascript" src="_recursos/js/console_area.js"></script>
<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">
<div class="contendor_kn">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2><b>REGISTRAR ASESOR</b></h2>            
    </div>
    <div class="panel-body">
                      <div class="col-sm-6">
                          <input type="text" id="txtid_asesor" hidden >
                          <label >PROFESION</label>
                          <select id="txtprofesion" class="form-control select2">
                            <option value="Abogado">Abogad@</option>
                            <option value="Psicologo">Psicolog@</option> 
                          </select>
                      </div>

	                    <div class="col-md-6">
	                        <label>APELLIDO PATERNO </label>
	                        <input type="text" class="form-control"onkeypress="return soloLetras(event)"id="txtapellidopaterno" placeholder="Ingrese Apellido Paterno" maxlength="">
	                       <br>
	                    </div>

	                    <div class="col-md-6">
	                        <label >APELLIDO MATERNO </label>
	                        <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtapellidomaterno" placeholder="Ingrese Apelido Materno" maxlength="">
	                        <br>
	                    </div> 
	                    <div class="col-sm-6">
	                        <label>NOMBRES </label>
	                        <input type="text" class="form-control" onkeypress="return soloLetras(event)" id="txtnombre" placeholder="Ingrese Nombres" maxlength="">
	                        <br>
	                    </div>
	                    <div class="col-sm-6">
	                        <label>Email</label>
	                        <input type="text"  class="form-control" id="txtemail_modal" style="width: 100%;" placeholder="Ingrese correo" maxlength="40">
	                    </div>
                      <div class="col-md-6">
	                        <label>CELULAR </label>
	                        <input type="text"class="form-control" id="txtmovil_modal"  onkeypress="return soloNumeros(event)" placeholder="Ingrese nro movil" maxlength="9">
	                            <br>
	                    </div>  
        <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
          <div class="col-md-12">
            <br><button class="btn btn-success" onclick="registrar_area()"><strong> Registrar Asesor</strong></button><br><br>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- INICIO MODAL -->
<!--Fin Modal-->

<style type="text/css">
	.contendor_kn{
		padding: 10px;
	}
</style>
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