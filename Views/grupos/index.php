<div class="container-fluid">
  <ol class="breadcrumb">
	  <li class="active">Inicio</li>
	</ol>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Lista de grupos</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row hidden">
          <a id="agregar" href="<?php echo URL; ?>grupos/agregar" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> agregar</a>
      </div>
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <!-- <th class="text-center">Id</th> -->
            <th class="text-center">Grupo</th>
            <th class="text-center">Materia</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Asesor</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Opciones</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <!-- <th class="text-center" style="font-weight: inherit;">Id</th> -->
            <th class="text-center" style="font-weight: inherit;">Grupo</th>
            <th class="text-center" style="font-weight: inherit;">Materia</th>
            <th class="text-center" style="font-weight: inherit;">Periodo</th>
            <th class="text-center" style="font-weight: inherit;">Ciclo</th>
            <th class="text-center" style="font-weight: inherit;">Asesor</th>
            <th class="text-center" style="font-weight: inherit;">Carrera</th>
            <th>Opciones</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($datos as $valor) { ?>
            <tr>
              <!-- <td><?php echo $valor['idGrupo']; ?></td> -->
              <td><?php echo $valor['nombre']; ?></td>
              <td><?php echo $valor['nombre_materia']; ?></td>
              <td><?php echo $valor['nombre_periodo']; ?></td>
              <td><?php echo $valor['nombre_ciclo']; ?></td>
              <td><?php echo $valor['nombre_asesor']; ?></td>
              <td><?php echo $valor['nombre_carrera']; ?></td>
              <td class="text-center">
                <a class="btn btn-info btn-xs" href="<?php echo URL; ?>grupos/ver/<?php echo $valor['idGrupo']; ?>" title="Ver"><i class="fa fa-check fa-fw" aria-hidden="true"></i></a>
              	<a class="btn btn-warning btn-xs" href="<?php echo URL; ?>grupos/editar/<?php echo $valor['idGrupo']; ?>" title="Editar"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
              	<a class="btn btn-danger btn-xs" href="<?php echo URL; ?>grupos/eliminar/<?php echo $valor['idGrupo']; ?>" title="Eliminar"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
          <?php unset($valor); ?>
        </tbody>
      </table>
	  </div>
	</div>
</div>