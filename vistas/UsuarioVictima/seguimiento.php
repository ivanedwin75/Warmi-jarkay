<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input.css">
<link rel='stylesheet' href='_recursos/css/reset.min.css'>
<link rel='stylesheet'><link rel="stylesheet" href="_recursos/css/estilo_s.css">


<div class="contendor_kn">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center><h4 data-lang="seguimiento"><b>SEGUIMIENTO</b></h4></center>
        </div> 
        <div class="panel-body"> 
            <div class="panelpq">
			<section class="cd-horizontal-timeline">
					<div class="timeline">
						<div class="events-wrapper">
							<div class="events">
								<ol>
									<li><a href="#0" data-date="16/01/2014" class="selected"></a></li>
									<li><a href="#0" data-date="16/02/2014"></a></li>
									<li><a href="#0" data-date="16/03/2014"></a></li>
									<li><a href="#0" data-date="16/04/2014"></a></li>
									<li><a href="#0" data-date="16/05/2014"></a></li>
								</ol>

								<span class="filling-line" aria-hidden="true"></span>
							</div> <!-- .events -->
						</div> <!-- .events-wrapper -->
							
						<ul class="cd-timeline-navigation">
							<li><a href="#0" class="prev inactive">Prev</a></li>
							<li><a href="#0" class="next">Next</a></li>
						</ul> <!-- .cd-timeline-navigation -->
					</div> <!-- .timeline -->

					<div class="events-content">
						<ol>
							<li class="selected" data-date="16/01/2014">
								<h3><b data-lang="comisaria">COMISARÍA</b></h3>
								<div class="panel3">
									<div id="listar_comisaria" class=" icon-loading">
										<i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
										<div id="nodatos"></div>
									</div> 
								</div>
							</li>

							<li data-date="16/02/2014">
								<h3><b data-lang="juzgado">JUZGADO</b></h3>
								<div class="panel3"> 
									<div id="listar_juzgado" class=" icon-loading">
										<i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
										<div id="nodatos"></div>
									</div>
								</div>
							</li>

							<li data-date="16/03/2014">
								<h3><b data-lang="fiscalia">FISCALÍA</b></h3>
								<div class="panel3"> 
									<div id="listar_fiscalia" class=" icon-loading">
										<i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
										<div id="nodatos"></div>
									</div>
								</div>
							</li>

							<li data-date="16/04/2014">
								<h3><b data-lang="pericia">PERICIAS</b></h3>
								<div class="panel3"> 
									<div id="listar_pericias" class=" icon-loading">
										<i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
										<div id="nodatos"></div>
									</div>
								</div>
							</li>
							<li data-date="16/05/2014">
								<h3 ><b data-lang="medidas">MEDIDAS</b></h3>
								<div class="panel3"> 
									<div id="listar_medidas" class=" icon-loading">
										<i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
										<div id="nodatos"></div>
									</div>	
								</div>
							</li>
						</ol>
					</div> 
				</section>
			</div>
        </div>
    </div>
</div>

<!-- INICIO MODAL -->
<script  src="_recursos/js/consola_usu_victima.js"></script>
<script type="text/javascript">listar_comisaria();</script>
<!--Fin Modal-->

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

