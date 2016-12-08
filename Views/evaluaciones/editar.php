<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['Grupo_idGrupo']; ?>">Ver</a></li>
    <li class="active">Editar</li>
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
      <form method="POST" enctype="multipart/form-data">
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
                <select name="indica1" class="form-control" required="">
                  <option <?php echo ($datos['indica1'] == "")?"selected":""; ?> value="">Seleccionar</option>
                  <option <?php echo ($datos['indica1'] == "10")?"selected":""; ?> value="10">10</option>
                  <option <?php echo ($datos['indica1'] == "9")?"selected":""; ?> value="9">9</option>
                  <option <?php echo ($datos['indica1'] == "8")?"selected":""; ?> value="8">8</option>
                  <option <?php echo ($datos['indica1'] == "7")?"selected":""; ?> value="7">7</option>
                  <option <?php echo ($datos['indica1'] == "6")?"selected":""; ?> value="6">6</option>
                  <option <?php echo ($datos['indica1'] == "5")?"selected":""; ?> value="5">5</option>
                  <option <?php echo ($datos['indica1'] == "4")?"selected":""; ?> value="4">4</option>
                  <option <?php echo ($datos['indica1'] == "3")?"selected":""; ?> value="3">3</option>
                  <option <?php echo ($datos['indica1'] == "2")?"selected":""; ?> value="2">2</option>
                  <option <?php echo ($datos['indica1'] == "1")?"selected":""; ?> value="1">1</option>
                  <option <?php echo ($datos['indica1'] == "0")?"selected":""; ?> value="0">0</option>
                  <option <?php echo ($datos['indica1'] == "N/A")?"selected":""; ?> value="N/A">N/A</option>
                </select>
              </td>
              <td class="text-center text-middle" rowspan="5">                   
                <textarea id="edit" name="obserG" class="form-control" required=""><?php echo $datos['obserG']; ?></textarea>
              </td>
            </tr>
            <tr>
              <td class="text-middle">2.- Foros de asesoría</td>
              <td class="text-center text-middle">
                <select name="indica2" class="form-control" required="">
                  <option <?php echo ($datos['indica2'] == "")?"selected":""; ?> value="">Seleccionar</option>
                  <option <?php echo ($datos['indica2'] == "10")?"selected":""; ?> value="10">10</option>
                  <option <?php echo ($datos['indica2'] == "9")?"selected":""; ?> value="9">9</option>
                  <option <?php echo ($datos['indica2'] == "8")?"selected":""; ?> value="8">8</option>
                  <option <?php echo ($datos['indica2'] == "7")?"selected":""; ?> value="7">7</option>
                  <option <?php echo ($datos['indica2'] == "6")?"selected":""; ?> value="6">6</option>
                  <option <?php echo ($datos['indica2'] == "5")?"selected":""; ?> value="5">5</option>
                  <option <?php echo ($datos['indica2'] == "4")?"selected":""; ?> value="4">4</option>
                  <option <?php echo ($datos['indica2'] == "3")?"selected":""; ?> value="3">3</option>
                  <option <?php echo ($datos['indica2'] == "2")?"selected":""; ?> value="2">2</option>
                  <option <?php echo ($datos['indica2'] == "1")?"selected":""; ?> value="1">1</option>
                  <option <?php echo ($datos['indica2'] == "0")?"selected":""; ?> value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">3.- Buzón de tareas</td>
              <td class="text-center text-middle">
                <select name="indica3" class="form-control" required="">
                  <option <?php echo ($datos['indica3'] == "")?"selected":""; ?> value="">Seleccionar</option>
                  <option <?php echo ($datos['indica3'] == "10")?"selected":""; ?> value="10">10</option>
                  <option <?php echo ($datos['indica3'] == "9")?"selected":""; ?> value="9">9</option>
                  <option <?php echo ($datos['indica3'] == "8")?"selected":""; ?> value="8">8</option>
                  <option <?php echo ($datos['indica3'] == "7")?"selected":""; ?> value="7">7</option>
                  <option <?php echo ($datos['indica3'] == "6")?"selected":""; ?> value="6">6</option>
                  <option <?php echo ($datos['indica3'] == "5")?"selected":""; ?> value="5">5</option>
                  <option <?php echo ($datos['indica3'] == "4")?"selected":""; ?> value="4">4</option>
                  <option <?php echo ($datos['indica3'] == "3")?"selected":""; ?> value="3">3</option>
                  <option <?php echo ($datos['indica3'] == "2")?"selected":""; ?> value="2">2</option>
                  <option <?php echo ($datos['indica3'] == "1")?"selected":""; ?> value="1">1</option>
                  <option <?php echo ($datos['indica3'] == "0")?"selected":""; ?> value="0">0</option>
                  <option <?php echo ($datos['indica3'] == "N/A")?"selected":""; ?> value="N/A">N/A</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">4.- Calificación a tiempo</td>
              <td class="text-center text-middle">
                <select name="indica4" class="form-control" required="">
                  <option <?php echo ($datos['indica4'] == "")?"selected":""; ?> value="">Seleccionar</option>
                  <option <?php echo ($datos['indica4'] == "10")?"selected":""; ?> value="10">10</option>
                  <option <?php echo ($datos['indica4'] == "9")?"selected":""; ?> value="9">9</option>
                  <option <?php echo ($datos['indica4'] == "8")?"selected":""; ?> value="8">8</option>
                  <option <?php echo ($datos['indica4'] == "7")?"selected":""; ?> value="7">7</option>
                  <option <?php echo ($datos['indica4'] == "6")?"selected":""; ?> value="6">6</option>
                  <option <?php echo ($datos['indica4'] == "5")?"selected":""; ?> value="5">5</option>
                  <option <?php echo ($datos['indica4'] == "4")?"selected":""; ?> value="4">4</option>
                  <option <?php echo ($datos['indica4'] == "3")?"selected":""; ?> value="3">3</option>
                  <option <?php echo ($datos['indica4'] == "2")?"selected":""; ?> value="2">2</option>
                  <option <?php echo ($datos['indica4'] == "1")?"selected":""; ?> value="1">1</option>
                  <option <?php echo ($datos['indica4'] == "0")?"selected":""; ?> value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">5.- Ingreso a plataforma</td>
              <td class="text-center text-middle">
                <select name="indica5" class="form-control" required="">
                  <option <?php echo ($datos['indica5'] == "")?"selected":""; ?> value="">Seleccionar</option>
                  <option <?php echo ($datos['indica5'] == "10")?"selected":""; ?> value="10">10</option>
                  <option <?php echo ($datos['indica5'] == "9")?"selected":""; ?> value="9">9</option>
                  <option <?php echo ($datos['indica5'] == "8")?"selected":""; ?> value="8">8</option>
                  <option <?php echo ($datos['indica5'] == "7")?"selected":""; ?> value="7">7</option>
                  <option <?php echo ($datos['indica5'] == "6")?"selected":""; ?> value="6">6</option>
                  <option <?php echo ($datos['indica5'] == "5")?"selected":""; ?> value="5">5</option>
                  <option <?php echo ($datos['indica5'] == "4")?"selected":""; ?> value="4">4</option>
                  <option <?php echo ($datos['indica5'] == "3")?"selected":""; ?> value="3">3</option>
                  <option <?php echo ($datos['indica5'] == "2")?"selected":""; ?> value="2">2</option>
                  <option <?php echo ($datos['indica5'] == "1")?"selected":""; ?> value="1">1</option>
                  <option <?php echo ($datos['indica5'] == "0")?"selected":""; ?> value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="text-center text-middle">
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
                <br><br>
                <div class="form-group">
                    <input id="imagen" name="imagen[]" type="file" class="file-loading" multiple accept="image/*">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
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