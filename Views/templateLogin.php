<?php namespace Views;

	$templateLogin = new TemplateLogin();

	class TemplateLogin{

		public function __construct(){
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?php echo URL; ?>Views/_public/img/esca_ico.png">

  <title>Iniciar sesión</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo URL; ?>Views/_public/css/bootstrap.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?php echo URL; ?>Views/_public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo URL; ?>Views/_public/css/signin.css" rel="stylesheet">

  <link href="<?php echo URL; ?>Views/_public/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo URL; ?>Views/_public/css/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo URL; ?>Views/_public/js/sweetalert2.min.js"></script>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php echo URL; ?>Views/_public/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<?php			
		}
		public function __destruct(){
?>
    
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?php echo URL; ?>Views/_public/js/ie10-viewport-bug-workaround.js"></script>
  
</body>

</html>
	
<?php
		}
	}
?>