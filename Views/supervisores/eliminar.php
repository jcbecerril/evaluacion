<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>supervisores">Supervisores</a></li>
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
				  <label class="col-md-4 control-label" for="idUsuario">Usuario</label>  
				  <div class="col-md-4">
				  <input id="idUsuario" name="idUsuario" value="<?php echo $datos['nombre_usuario']; ?>" class="form-control input-md" type="text" readonly="">
				    
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