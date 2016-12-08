<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>carreras">Carreras</a></li>
	  <li class="active">Editar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar carrera</h3>
	  </div>
	  <div class="panel-body">
      <form id="eliminar" class="form-horizontal" method="POST">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
				  <div class="col-md-4">
				  <input id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" placeholder="Nombre" class="form-control input-md" type="text" readonly="">
				    
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