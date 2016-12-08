<?php $roles = $usuarios->allRol(); ?>
<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>usuarios">Usuarios</a></li>
	  <li class="active">Editar</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar usuario</h3>
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

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="user">Usuario</label>
				  <div class="col-md-4">
				    <input id="user" name="user" value="<?php echo $datos['user']; ?>" placeholder="Usuario" class="form-control input-md" type="text" readonly="">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="pass">Contraseña</label>
				  <div class="col-md-4">
				    <input id="pass" name="pass" placeholder="Contraseña" class="form-control input-md" type="password">
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="rol">Rol</label>
				  <div class="col-md-4">
				    <select id="rol" name="rol" class="form-control js-example-basic-single" required style="width: 100%">
				    	<option value="">Seleccionar</option>
				    	<?php foreach ($roles as $valor) { ?>
				    		<option <?php echo ($datos['Rol_idRol'] == $valor['idRol'])?"Selected":""; ?> value="<?php echo $valor['idRol']; ?>"><?php echo $valor['nombre']; ?></option>
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