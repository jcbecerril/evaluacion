<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li class="active">Asesores</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Lista de asesores</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row hidden">
          <a id="agregar" href="<?php echo URL; ?>asesores/agregar" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> agregar</a>
      </div>
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th class="text-center">Satus</th>
            <th class="text-center">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos as $valor) { ?>
            <tr>
              <td><?php echo $valor['idAsesor']; ?></td>
              <td><?php echo $valor['nombre']; ?></td>
              <td><?php echo $valor['email']; ?></td>
              <td class="text-center"><?php echo ($valor['status'] == 1)?"<span class='label label-success'>Activo</span>":"<span class='label label-danger'>Inactivo</span>"; ?></td>
              <td class="text-center">
              	<a class="btn btn-warning btn-xs" href="<?php echo URL; ?>asesores/editar/<?php echo $valor['idAsesor']; ?>" title="Editar"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
              	<a class="btn btn-danger btn-xs" href="<?php echo URL; ?>asesores/eliminar/<?php echo $valor['idAsesor']; ?>" title="Eliminar"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
          <?php unset($valor); ?>
        </tbody>
      </table>
	  </div>
	</div>
</div>