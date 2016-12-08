<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
	  <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['idGrupo']; ?>">Ver</a></li>
    <li class="active">Evaluar</li>
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
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Semana <?php echo $_GET['s']; ?></h3>
	  </div>
	  <div class="panel-body">
      <form method="POST" enctype="multipart/form-data">
  	    <table class="table table-bordered table-condensed">
          <tbody>
            <tr class="text-center">
              <td><b>Indicadores de cumplimiento</b></td>
              <td><b>Calificación de (0 a 10)</b></td>
              <td width="45%"><b>Observaciones</b></td>
            </tr>
            <tr>
              <td class="text-middle">1.- Foros de actividad de aprendizaje</td>
              <td class="text-center text-middle">
                <select name="indica1" class="form-control" required="">
                  <option value="">Seleccionar</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                  <option value="N/A">N/A</option>
                </select>
              </td>
              <td class="text-center text-middle" rowspan="5">                   
                <textarea id="edit" class="form-control" name="obserG" required=""></textarea>
              </td>
            </tr>
            <tr>
              <td class="text-middle">2.- Foros de asesoría</td>
              <td class="text-center text-middle">
                <select name="indica2" class="form-control" required="">
                  <option value="">Seleccionar</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">3.- Buzón de tareas</td>
              <td class="text-center text-middle">
                <select name="indica3" class="form-control" required="">
                  <option value="">Seleccionar</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                  <option value="N/A">N/A</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">4.- Calificación a tiempo</td>
              <td class="text-center text-middle">
                <select name="indica4" class="form-control" required="">
                  <option value="">Seleccionar</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-middle">5.- Ingreso a plataforma</td>
              <td class="text-center text-middle">
                <select name="indica5" class="form-control" required="">
                  <option value="">Seleccionar</option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                  <option value="7">7</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="0">0</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="text-center">
                <p><strong>Evidencias</strong></p>
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