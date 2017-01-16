<?php $s1 = $evaluaciones->view($datos['idGrupo'], 1);?>
<?php $s2 = $evaluaciones->view($datos['idGrupo'], 2);?>
<?php $s3 = $evaluaciones->view($datos['idGrupo'], 3);?>
<?php $s4 = $evaluaciones->view($datos['idGrupo'], 4);?>
<?php $s5 = $evaluaciones->view($datos['idGrupo'], 5);?>
<?php $s6 = $evaluaciones->view($datos['idGrupo'], 6);?>

<?php $send1 = $evaluaciones->find($datos['idGrupo'], 1);?>
<?php $send2 = $evaluaciones->find($datos['idGrupo'], 2);?>
<?php $send3 = $evaluaciones->find($datos['idGrupo'], 3);?>
<?php $send4 = $evaluaciones->find($datos['idGrupo'], 4);?>
<?php $send5 = $evaluaciones->find($datos['idGrupo'], 5);?>
<?php $send6 = $evaluaciones->find($datos['idGrupo'], 6);?>

<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
    <li class="active">Ver</li>
	</ol>
  <div class="row text-center">
    <div class="col-md-12"><h2><?php echo $datos['nombre_materia']; ?></h2></div>
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <p>Asesor: <?php echo $datos['nombre_asesor']; ?></p>
    </div>
    <div class="col-md-2">
      <p>Grupo: <?php echo $datos['nombre']; ?></p>
    </div>
    <div class="col-md-3">
      <p>Periodo: <?php echo $datos['nombre_periodo']; ?></p>
    </div>
    <div class="col-md-3">
      <p>Ciclo: <?php echo $datos['nombre_ciclo']; ?></p>
    </div>
  </div>
  <hr>
	<div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 1</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send1 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s1['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s1['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s1['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=1" class="btn btn-default redirect" title="Calificar" <?php echo ($s1['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=1" class="btn btn-default redirect" title="Enviar" <?php echo $s1['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=1" class="btn btn-default" title="PDF" <?php echo $s1['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s1['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=1"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=1"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 2</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send2 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s2['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s2['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s2['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=2" class="btn btn-default redirect" title="Calificar" <?php echo ($s2['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=2" class="btn btn-default redirect" title="Enviar" <?php echo $s2['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=2" class="btn btn-default" title="PDF" <?php echo $s2['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s2['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=2"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=2"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 3</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send3 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s3['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s3['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s3['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=3" class="btn btn-default redirect" title="Calificar" <?php echo ($s3['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=3" class="btn btn-default redirect" title="Enviar" <?php echo $s3['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=3" class="btn btn-default" title="PDF" <?php echo $s3['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s3['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=3"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=3"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 4</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send4 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s4['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s4['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s4['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=4" class="btn btn-default redirect" title="Calificar" <?php echo ($s4['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=4" class="btn btn-default redirect" title="Enviar" <?php echo $s4['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=4" class="btn btn-default" title="PDF" <?php echo $s4['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s4['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=4"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=4"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 5</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send5 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s5['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s5['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s5['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=5" class="btn btn-default redirect" title="Calificar" <?php echo ($s5['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=5" class="btn btn-default redirect" title="Enviar" <?php echo $s5['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=5" class="btn btn-default" title="PDF" <?php echo $s5['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s5['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=5"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=5"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div class="row">
            <div class="col-md-6">
              <h3>Semana 6</h3>
            </div>
            <div class="col-md-6">
              <p class="text-right">
              <span class="label label-default"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo($send6 == 1)?'Enviado':'No enviado'; ?></span></p>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-<?php echo $s6['color']; ?>" role="progressbar" aria-valuenow="<?php echo $s6['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
              <span><?php echo $s6['result']; ?>/10</span>
            </div>
          </div>
          <div align="right">
            <div class="btn-group" role="group" aria-label="...">
              <button href="<?php echo URL; ?>evaluaciones/agregar/<?php echo $datos['idGrupo']; ?>?s=6" class="btn btn-default redirect" title="Calificar" <?php echo ($s6['disabled'] != 'disabled')?'disabled':''; ?>><i class="fa fa-wpforms fa-lg fa-fw text-success" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/enviar/<?php echo $datos['idGrupo']; ?>?s=6" class="btn btn-default redirect" title="Enviar" <?php echo $s6['disabled']; ?>><i class="fa fa-envelope-o fa-lg fa-fw text-primary" aria-hidden="true"></i></button>
              <button href="<?php echo URL; ?>evaluaciones/pdf/<?php echo $datos['idGrupo']; ?>?s=6" class="btn btn-default" title="PDF" <?php echo $s6['disabled']; ?>><i class="fa fa-file-pdf-o fa-lg fa-fw text-danger" aria-hidden="true"></i></button>
              <div class="btn-group" role="group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo $s6['disabled']; ?>>
                  Opciones
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>evaluaciones/editar/<?php echo $datos['idGrupo']; ?>?s=6"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></li>
                  <li><a href="<?php echo URL; ?>evaluaciones/eliminar/<?php echo $datos['idGrupo']; ?>?s=6"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Eliminar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-12">
      <p>Calificación Total: <?php echo ($s1['result'] + $s2['result'] + $s3['result'] + $s4['result'] + $s5['result'] + $s6['result']) / 6; ?></p>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-12">
      <a class="btn btn-primary" href="<?php echo URL; ?>grupos/reporte/<?php echo $datos['idGrupo']; ?>"><i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i> Reporte</a>
    </div>
  </div>
</div>