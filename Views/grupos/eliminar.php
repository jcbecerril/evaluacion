<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li class="active">Eliminar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Eliminar grupo</h3>
	  </div>
	  <div class="panel-body">
      <form id="eliminar" class="form-horizontal" method="POST">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
				  <div class="col-md-4">
				  <input id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="clave">Materia</label>  
				  <div class="col-md-4">
				  <input id="clave" name="clave" value="<?php echo $datos['nombre_materia']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idPeriodo">Periodo</label>  
				  <div class="col-md-4">
				  <input id="idPeriodo" name="idPeriodo" value="<?php echo $datos['nombre_periodo']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idCiclo">Ciclo</label>  
				  <div class="col-md-4">
				  <input id="idCiclo" name="idCiclo" value="<?php echo $datos['nombre_ciclo']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idAsesor">Asesor</label>  
				  <div class="col-md-4">
				  <input id="idAsesor" name="idAsesor" value="<?php echo $datos['nombre_asesor']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idCarrera">Carrera</label>  
				  <div class="col-md-4">
				  <input id="idCarrera" name="idCarrera" value="<?php echo $datos['nombre_carrera']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group text-center">
				  <div class="col-md-12">
				    <button type="submit" class="btn btn-success">Enviar</button>
				  </div>
				</div>
				</form>

	  </div>
	</div>
</div>