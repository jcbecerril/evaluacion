<?php $usuarios = $supervisores->allUsuarioSupervisor(); ?>
<?php $carreras = $supervisores->allCarrera(); ?>
<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>supervisores">Supervisores</a></li>
	  <li class="active">Agregar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar grupo</h3>
	  </div>
	  <div class="panel-body">
      <form class="form-horizontal" method="POST">
				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idUsuario">Usuario</label>
				  <div class="col-md-4">
				    <select id="idUsuario" name="idUsuario" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($usuarios as $valor) { ?>
				    		<option value="<?php echo $valor['idUsuario']; ?>"><?php echo $valor['nombre']; ?></option>
				    	<?php } ?>
				    	<?php unset($valor); ?>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idCarrera">Carrera</label>
				  <div class="col-md-4">
				    <select id="idCarrera" name="idCarrera" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($carreras as $valor) { ?>
				    		<option value="<?php echo $valor['idCarrera']; ?>"><?php echo $valor['nombre']; ?></option>
				    	<?php } ?>
				    	<?php unset($valor); ?>
				    </select>
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