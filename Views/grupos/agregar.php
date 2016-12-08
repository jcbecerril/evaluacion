<?php $materias = $grupos->allMateria(); ?>
<?php $periodos = $grupos->allPeriodo(); ?>
<?php $ciclos = $grupos->allCiclo(); ?>
<?php $asesores = $grupos->allAsesorActivo(); ?>
<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li class="active">Agregar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar grupo</h3>
	  </div>
	  <div class="panel-body">
      <form class="form-horizontal" method="POST">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
				  <div class="col-md-4">
				  <input id="nombre" name="nombre" placeholder="Nombre" class="form-control input-md" required="" type="text">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="clave">Materia</label>
				  <div class="col-md-4">
				    <select id="clave" name="clave" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($materias as $valor) { ?>
				    		<option value="<?php echo $valor['clave']; ?>"><?php echo $valor['nombre_carrera'] . " - " . $valor['nombre']; ?></option>
				    	<?php } ?>
				    	<?php unset($valor); ?>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idPeriodo">Periodo</label>
				  <div class="col-md-4">
				    <select id="idPeriodo" name="idPeriodo" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($periodos as $valor) { ?>
				    		<option value="<?php echo $valor['idPeriodo']; ?>"><?php echo $valor['nombre']; ?></option>
				    	<?php } ?>
				    	<?php unset($valor); ?>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idCiclo">Ciclo</label>
				  <div class="col-md-4">
				    <select id="idCiclo" name="idCiclo" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($ciclos as $valor) { ?>
				    		<option value="<?php echo $valor['idCiclo']; ?>"><?php echo $valor['nombre']; ?></option>
				    	<?php } ?>
				    	<?php unset($valor); ?>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idAsesor">Asesor</label>
				  <div class="col-md-4">
				    <select id="idAsesor" name="idAsesor" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($asesores as $valor) { ?>
				    		<option value="<?php echo $valor['idAsesor']; ?>"><?php echo $valor['nombre']; ?></option>
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