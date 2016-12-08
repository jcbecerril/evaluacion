<?php $carreras = $materias->allCarrera(); ?>
<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>materias">Materias</a></li>
	  <li class="active">Editar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar materia</h3>
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
				  <label class="col-md-4 control-label" for="creditos">Créditos</label>  
				  <div class="col-md-4">
				  <input id="creditos" name="creditos" value="<?php echo $datos['creditos']; ?>" placeholder="Créditos" class="form-control input-md" required="" type="number" step="any" min="1" max="9">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nivel">Nivel</label>
				  <div class="col-md-4">
				    <select id="nivel" name="nivel" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<option <?php echo ($datos['nivel'] == "I")?"Selected":""; ?> value="I">Nivel I</option>
				    	<option <?php echo ($datos['nivel'] == "II")?"Selected":""; ?> value="II">Nivel II</option>
				    	<option <?php echo ($datos['nivel'] == "III")?"Selected":""; ?> value="III">Nivel III</option>
				    	<option <?php echo ($datos['nivel'] == "IV")?"Selected":""; ?> value="IV">Nivel IV</option>
				    	<option <?php echo ($datos['nivel'] == "V")?"Selected":""; ?> value="V">Nivel V</option>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="optativa">Optativa</label>
				  <div class="col-md-4">
				    <select id="optativa" name="optativa" class="form-control js-example-basic-single" style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<option <?php echo ($datos['optativa'] == "A")?"Selected":""; ?> value="A">Optativa - A</option>
				    	<option <?php echo ($datos['optativa'] == "B")?"Selected":""; ?> value="B">Optativa - B</option>
				    	<option <?php echo ($datos['optativa'] == "C")?"Selected":""; ?> value="C">Optativa - C</option>
				    </select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="idcarrera">Carrera</label>
				  <div class="col-md-4">
				    <select id="idcarrera" name="idcarrera" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($carreras as $valor) { ?>
				    		<option <?php echo ($datos['Carrera_idCarrera'] == $valor['idCarrera'])?"Selected":""; ?> value="<?php echo $valor['idCarrera']; ?>"><?php echo $valor['nombre']; ?></option>
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