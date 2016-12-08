<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>materias">Materias</a></li>
	  <li class="active">Eliminar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Eliminar materia</h3>
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
				  <label class="col-md-4 control-label" for="creditos">Créditos</label>  
				  <div class="col-md-4">
				  <input id="creditos" name="creditos" value="<?php echo $datos['creditos']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nivel">Nivel</label>  
				  <div class="col-md-4">
				  <input id="nivel" name="nivel" value="<?php echo $datos['nivel']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="optativa">Optativa</label>  
				  <div class="col-md-4">
				  <input id="optativa" name="optativa" value="<?php echo $datos['optativa']; ?>" class="form-control input-md" type="text" readonly="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nombre">Carrera</label>  
				  <div class="col-md-4">
				  <input id="carrera" name="carrera" value="<?php echo $datos['nombre_carrera']; ?>" class="form-control input-md" type="text" readonly="">
				    
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