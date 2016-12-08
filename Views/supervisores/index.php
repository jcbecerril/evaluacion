<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li class="active">Supervisores</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Lista de supervisores</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row hidden">
          <a id="agregar" href="<?php echo URL; ?>supervisores/agregar" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> agregar</a>
      </div>
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th class="text-center">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos as $valor) { ?>
            <tr>
              <td><?php echo $valor['idSupervisor']; ?></td>
              <td><?php echo $valor['nombre_usuario']; ?></td>
              <td><?php echo $valor['nombre_carrera']; ?></td>
              <td class="text-center">
              	<a class="btn btn-danger btn-xs" href="<?php echo URL; ?>supervisores/eliminar/<?php echo $valor['idSupervisor']; ?>" title="Eliminar"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
          <?php unset($valor); ?>
        </tbody>
      </table>
	  </div>
	</div>
</div>