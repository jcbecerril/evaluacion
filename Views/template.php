<?php namespace Views;

  ob_start();
  session_name("EVALSESSID");
  session_start();

  $template = new Template();

  class Template{

    public function __construct(){
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?php echo URL; ?>Views/_public/img/esca_ico.png">

  <title>UTE-CV || Tepepan</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo URL; ?>Views/_public/css/bootstrap.css" rel="stylesheet">

  <link href="<?php echo URL; ?>Views/_public/css/font-awesome.min.css" rel="stylesheet">

  <!-- Alert2 -->
  <link href="<?php echo URL; ?>Views/_public/css/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo URL; ?>Views/_public/js/sweetalert2.min.js"></script>

  <!-- Custom CSS -->
  <link href="<?php echo URL; ?>Views/_public/css/simple-sidebar.css" rel="stylesheet">
  <link href="<?php echo URL; ?>Views/_public/css/sticky-footer.css" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

  <!-- Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <link href="<?php echo URL; ?>Views/_public/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Include Editor style. -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
  <link href='<?php echo URL; ?>Views/_public/css/char_counter.min.css' rel='stylesheet' type='text/css' />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <div id="wrapper">

    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar top-bar"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>
            </button>
            <span class="navbar-brand"><img src="<?php echo URL; ?>Views/_public/img/virtual.png"></span>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <span class="navbar-text" style="margin-right: 0px;">Usted se ha identificado como</span>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>usuarios/perfil"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Editar perfil</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo URL; ?>login/sessionLogout"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Salir</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header><!-- /header -->

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">UTE-CV</li>
        <li class="logo_esca">
          <img src="<?php echo URL; ?>Views/_public/img/esca_logo.png">
        </li>
        <li class="rol"><?php echo $_SESSION['rol']; ?></li>
        <?php if ($_SESSION['idRol'] == 1) { ?>
        <li>
          <a href="<?php echo URL; ?>usuarios"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Usuarios</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>roles"><i class="fa fa-tag fa-fw" aria-hidden="true"></i> Roles</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>materias"><i class="fa fa-book fa-fw" aria-hidden="true"></i> Materias</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>carreras"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i> Carreras</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>periodos"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> Periodos</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>ciclos"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Ciclos</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>asesores"><i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i> Asesores</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>grupos"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Grupos</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>supervisores"><i class="fa fa-user-secret fa-fw" aria-hidden="true"></i> Supervisores</a>
        </li>
        <?php }else { ?>
        <li>
          <a href="<?php echo URL; ?>grupos"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Grupos</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>asesores"><i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i> Asesores</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>materias"><i class="fa fa-book fa-fw" aria-hidden="true"></i> Materias</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>carreras"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i> Carreras</a>
        </li>
        <?php } ?>
        
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

<?php           
    }

    public function __destruct(){
      ob_end_flush();
?>

  <footer class="footer">
    <div class="container">
      <p class="text-muted text-center">Instituto Politécnico Nacional</p>
    </div>
  </footer>

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="<?php echo URL; ?>Views/_public/js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo URL; ?>Views/_public/js/bootstrap.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>

  <script src="<?php echo URL; ?>Views/_public/js/fileinput.js" type="text/javascript"></script>
  <script src="<?php echo URL; ?>Views/_public/js/es.js" type="text/javascript"></script>

  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <!-- Include JS file. -->
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/js/froala_editor.min.js'></script>
  <script src="<?php echo URL; ?>Views/_public/js/edit_es.js" type="text/javascript"></script>
  <script src="<?php echo URL; ?>Views/_public/js/char_counter.min.js" type="text/javascript"></script>

  <script src="<?php echo URL; ?>Views/_public/js/custom.js"></script>

</body>

</html>

<?php
    }

  }

?>