<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>asesores">Asesores</a></li>
	  <li class="active">Eliminar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Eliminar asesor</h3>
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
				  <label class="col-md-4 control-label" for="email">Correo</label>  
				  <div class="col-md-4">
				  <input id="email" name="email" value="<?php echo $datos['email']; ?>" class="form-control input-md" type="email" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="status">Status</label>  
				  <div class="col-md-4">
				  <input id="status" name="status" value="<?php echo ($datos['status'] == 1)?"Activo":"Inactivo"; ?>" class="form-control input-md" type="email" readonly="">
				    
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