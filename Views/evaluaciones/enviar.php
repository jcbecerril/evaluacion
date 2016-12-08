<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
    <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['Grupo_idGrupo']; ?>">Ver</a></li>
    <li class="active">Enviar</li>
  </ol>
  <div class="row text-center">
    <div class="col-md-12"><h2><?php echo $datos['nombre_materia']; ?></h2></div>
  </div>
  <hr>
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Semana <?php echo $_GET['s']; ?></h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-bordered table-striped" cellspacing="0" width="100%">
        <caption>
          <div class="row">
            <div class="col-md-3">
              <p><i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i> <?php echo $datos['nombre_asesor']; ?></p>
            </div>
            <div class="col-md-3">
              <p><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <?php echo $datos['email']; ?></p>
            </div>
            <div class="col-md-3">
              <p><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> <?php echo $datos['nombre_periodo']; ?></p>
            </div>
            <div class="col-md-3">
              <p><i class="fa fa-calendar fa-fw" aria-hidden="true"></i> <?php echo $datos['nombre_ciclo']; ?></p>
            </div>
          </div>
        </caption>
        <thead>
          <tr>
            <th class="text-center text-middle">Indicadores de cumplimiento</th>
            <th class="text-center text-middle">Calificación de (0 a 10)</th>
            <th class="text-center text-middle">%</th>
            <th class="text-center text-middle">Resultado de la ponderación</th>
            <th class="text-center text-middle" width="35%">Observaciones</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td class="text-middle">1.- Foros de actividad de aprendizaje</td>
              <td class="text-center text-middle"><?php echo $datos['indica1']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['porci1']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['resul1']; ?></td>
              <td class="text-middle" rowspan="6"><?php echo $datos['obserG']; ?></td>
            </tr>
            <tr>
              <td class="text-middle">2.- Foros de asesoría</td>
              <td class="text-center text-middle"><?php echo $datos['indica2']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['porci2']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['resul2']; ?></td>
            </tr>
            <tr>
              <td class="text-middle">3.- Buzón de tareas</td>
              <td class="text-center text-middle"><?php echo $datos['indica3']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['porci3']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['resul3']; ?></td>
            </tr>
            <tr>
              <td class="text-middle">4.- Calificación a tiempo</td>
              <td class="text-center text-middle"><?php echo $datos['indica4']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['porci4']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['resul4']; ?></td>
            </tr>
            <tr>
              <td class="text-middle">5.- Ingreso a plataforma</td>
              <td class="text-center text-middle"><?php echo $datos['indica5']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['porci5']; ?></td>
              <td class="text-center text-middle"><?php echo $datos['resul5']; ?></td>
            </tr>
            <tr>
              <td class="text-center text-middle" colspan="3"><b>Calificación obtenida</b></td>
              <td class="text-center text-middle"><?php echo $datos['result']; ?></td>
            </tr>
            <tr>
              <td class="text-center text-middle" colspan="5">
                <p><strong>Evidencias</strong></p>
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
        <form method="POST">
          <div class="form-group text-center">
            <div class="col-md-12">
              <input type="hidden" name="hidden">
              <button id="enviar" type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-pulse fa-fw'></i> Enviando"><i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i> Enviar</button>
            </div>
          </div>
        </form>
	  </div>
	</div>
</div>