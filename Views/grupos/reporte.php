<?php $s1 = $evaluaciones->view($datos['idGrupo'], 1);?>
<?php $s2 = $evaluaciones->view($datos['idGrupo'], 2);?>
<?php $s3 = $evaluaciones->view($datos['idGrupo'], 3);?>
<?php $s4 = $evaluaciones->view($datos['idGrupo'], 4);?>
<?php $s5 = $evaluaciones->view($datos['idGrupo'], 5);?>
<?php $s6 = $evaluaciones->view($datos['idGrupo'], 6);?>

<div class="container-fluid">
  <ol class="breadcrumb">
	  <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
    <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['idGrupo']; ?>">Ver</a></li>
    <li class="active">Reporte</li>
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
    <div class="col-md-12">
      <div id="charts" width="100%"></div>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-12">
      <p>Promedio: <?php echo ($s1['result'] + $s2['result'] + $s3['result'] + $s4['result'] + $s5['result'] + $s6['result']) / 6; ?></p>
    </div>
  </div>

  <form method="POST">
    <div class="form-group text-center">
      <div class="col-md-12">
        <input type="hidden" id="img" name="img" value="">
        <button id="enviar" type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-pulse fa-fw'></i> Enviando"><i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i> Enviar</button>
      </div>
    </div>
  </form>
  <br><br>
</div>
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.
    var data = google.visualization.arrayToDataTable([
      ['Element', 'Calificación', { role: 'style' }, { role: 'annotation' } ],
      ['Semana 1', <?php echo $s1['result'] ?>, operacion(<?php echo $s1['result'] ?>), '<?php echo $s1['result'] ?>'],
      ['Semana 2', <?php echo $s2['result'] ?>, operacion(<?php echo $s2['result'] ?>), '<?php echo $s2['result'] ?>'],
      ['Semana 3', <?php echo $s3['result'] ?>, operacion(<?php echo $s3['result'] ?>), '<?php echo $s3['result'] ?>'],
      ['Semana 4', <?php echo $s4['result'] ?>, operacion(<?php echo $s4['result'] ?>), '<?php echo $s4['result'] ?>'],
      ['Semana 5', <?php echo $s5['result'] ?>, operacion(<?php echo $s5['result'] ?>), '<?php echo $s5['result'] ?>'],
      ['Semana 6', <?php echo $s6['result'] ?>, operacion(<?php echo $s6['result'] ?>), '<?php echo $s6['result'] ?>']
    ]);

    // Set chart options
    var options = 
      {
        // 'title':'How Much Pizza I Ate Last Night',
        // 'width':500,
        legend: 'none',
        bar: {groupWidth: '90%'},
        vAxis: { maxValue: 9, gridlines: { count: 11 } },
        height:500
      };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.ColumnChart(document.getElementById('charts'));

google.visualization.events.addListener(chart, 'ready', function () {
        chart.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart.innerHTML);
        document.getElementById('img').value=chart.innerHTML;
      });


    chart.draw(data, options);
  }

  function operacion(valor){
    if (valor < 6) {
        return "#d9534f";
    }else if (valor <= 7.9) {
        return "#f0ad4e";
    }else if (valor >= 8) {
        return "#5cb85c";
    }
  }
</script>
