<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['Grupo_idGrupo']; ?>">Ver</a></li>
    <li class="active">Eliminar</li>
	</ol>
  <div class="row text-center">
    <div class="col-md-12"><h2><?php echo $datos['nombre_materia']; ?></h2></div>
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <p>Asesor: <?php echo $datos['nombre_asesor']; ?></p>
    </div>
    <div class="col-md-2">
      <p>Grupo: <?php echo $datos['nombre_grupo']; ?></p>
    </div>
    <div class="col-md-3">
      <p>Periodo: <?php echo $datos['nombre_periodo']; ?></p>
    </div>
    <div class="col-md-3">
      <p>Ciclo: <?php echo $datos['nombre_ciclo']; ?></p>
    </div>
  </div>
  <hr>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Semana <?php echo $_GET['s']; ?></h3>
	  </div>
	  <div class="panel-body">
      <form id="eliminar" method="POST" enctype="multipart/form-data">
  	    <table class="table table-bordered" cellspacing="0" width="100%">
          <tbody>
            <tr class="text-center">
              <td><b>Indicadores de cumplimiento</b></td>
              <td><b>Calificación de (0 a 10)</b></td>
              <td width="35%"><b>Observaciones</b></td>
            </tr>
            <tr>
              <td class="text-middle">1.- Foros de actividad de aprendizaje</td>
              <td class="text-center text-middle">
                <input name="indica1" value="<?php echo $datos['indica1']; ?>" class="form-control input-md" type="text" readonly="">
              </td>
              <td class="text-middle text-muted" rowspan="6"><?php echo $datos['obserG']; ?></td>
            </tr>
            <tr>
              <td class="text-middle">2.- Foros de asesoría</td>
              <td class="text-center text-middle">
                <input name="indica2" value="<?php echo $datos['indica2']; ?>" class="form-control input-md" type="text" readonly="">
              </td>
            </tr>
            <tr>
              <td class="text-middle">3.- Buzón de tareas</td>
              <td class="text-center text-middle">
                <input name="indica3" value="<?php echo $datos['indica3']; ?>" class="form-control input-md" type="text" readonly="">
              </td>
            </tr>
            <tr>
              <td class="text-middle">4.- Calificación a tiempo</td>
              <td class="text-center text-middle">
                <input name="indica4" value="<?php echo $datos['indica4']; ?>" class="form-control input-md" type="text" readonly="">
              </td>
            </tr>
            <tr>
              <td class="text-middle">5.- Ingreso a plataforma</td>
              <td class="text-center text-middle">
                <input name="indica5" value="<?php echo $datos['indica5']; ?>" class="form-control input-md" type="text" readonly="">
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center text-middle">
                <p><strong>Evidencias</strong></p>
                <input type="hidden" name="img1" value="<?php echo $datos['img1']; ?>">
                <input type="hidden" name="img2" value="<?php echo $datos['img2']; ?>">
                <input type="hidden" name="img3" value="<?php echo $datos['img3']; ?>">
                <input type="hidden" name="img4" value="<?php echo $datos['img4']; ?>">
                <input type="hidden" name="img5" value="<?php echo $datos['img5']; ?>">
                <?php if (!empty($datos['img1'])) { ?>
                  <img src="<?php echo URL; ?>Views/_public/img/evidencias/<?php echo $datos['img1']; ?>" width="10%">
                <?php } ?>
                <?php if (!empty($datos['img2'])) { ?>
                  <img src="<?php echo URL; ?>Views/_public/img/evidencias/<?php echo $datos['img2']; ?>" width="10%">
                <?php } ?>
                <?php if (!empty($datos['img3'])) { ?>
                  <img src="<?php echo URL; ?>Views/_public/img/evidencias/<?php echo $datos['img3']; ?>" width="10%">
                <?php } ?>
                <?php if (!empty($datos['img4'])) { ?>
                  <img src="<?php echo URL; ?>Views/_public/img/evidencias/<?php echo $datos['img4']; ?>" width="10%">
                <?php } ?>
                <?php if (!empty($datos['img5'])) { ?>
                  <img src="<?php echo URL; ?>Views/_public/img/evidencias/<?php echo $datos['img5']; ?>" width="10%">
                <?php } ?>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="form-group text-center">
          <div class="col-md-12">
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        </div>
      </form>
	  </div>
	</div>
</div>