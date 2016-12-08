<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li class="active">Roles</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Lista de roles</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row hidden">
          <a id="agregar" href="<?php echo URL; ?>roles/agregar" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> agregar</a>
      </div>
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th class="text-center">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos as $valor) { ?>
            <tr>
              <td><?php echo $valor['idRol']; ?></td>
              <td><?php echo $valor['nombre']; ?></td>
              <td class="text-center">
              	<a class="btn btn-warning btn-xs" href="<?php echo URL; ?>roles/editar/<?php echo $valor['idRol']; ?>" title="Editar"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
              	<a class="btn btn-danger btn-xs" href="<?php echo URL; ?>roles/eliminar/<?php echo $valor['idRol']; ?>" title="Eliminar"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
          <?php unset($valor); ?>
        </tbody>
      </table>
	  </div>
	</div>
</div>