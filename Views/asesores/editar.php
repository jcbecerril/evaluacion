<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>asesores">Asesores</a></li>
	  <li class="active">Editar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar asesor</h3>
	  </div>
	  <div class="panel-body">
      <form class="form-horizontal" method="POST">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
				  <div class="col-md-4">
				  <input id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" placeholder="Nombre" class="form-control input-md" required="" type="text">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="email">Correo</label>  
				  <div class="col-md-4">
				  <input id="email" name="email" value="<?php echo $datos['email']; ?>" placeholder="Correo" class="form-control input-md" required="" type="email">
				    
				  </div>
				</div>

				<!-- Multiple Checkboxes (inline) -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="checkboxes">Status</label>
				  <div class="col-md-4">
				    <label class="checkbox-inline" for="checkboxes-0">
				      <input name="status" id="checkboxes-0" value="1" type="checkbox" <?php echo ($datos['status'] == 1)?"checked":""; ?>>
				      Activo
				    </label>
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group text-center">
				  <div class="col-md-12">
				    <button type="submit" class="btn btn-success">Guardar</button>
				    <button type="reset" class="btn btn-danger">Cancelar</button>
				  </div>
				</div>
				</form>

	  </div>
	</div>
</div>