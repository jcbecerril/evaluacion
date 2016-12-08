<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="<?php echo URL; ?>grupos">Inicio</a></li>
    <li><a href="<?php echo URL; ?>grupos/ver/<?php echo $datos['Grupo_idGrupo']; ?>">Ver</a></li>
    <li class="active">PDF</li>
  </ol>
  <hr>
  <div class="embed-responsive embed-responsive-16by9">
  <iframe src="<?php echo URL; ?>Views/_public/pdf/<?php echo $datos['Grupo_idGrupo'] ?>_<?php echo $datos['semana'] ?>.pdf" frameborder="0"></iframe>
</div>
  
</div>