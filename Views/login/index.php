<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<img src="<?php echo URL; ?>Views/_public/img/esca_logo.png">
		</div>
	</div>
	<br>
  <div class="panel panel-default form-signin">
    <div class="panel-heading text-center">Sistema de evaluación AulaPolivirtual</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" accept-charset="utf-8">
        <!-- Text input-->
        <div class="form-group"> 
          <div class="col-md-12">
            <div class="input-group margin-bottom-sm">
              <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
              <input id="user" name="user" placeholder="Usuario" class="form-control input-md" required="" type="text" autofocus="">
            </div>
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group margin-bottom-sm">
              <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
              <input id="password" name="password" placeholder="Contraseña" class="form-control input-md" required="" type="password">
            </div>
          </div>
        </div>

        <input type="hidden" name="token" value="<?php echo $datos['token']; ?>">

        <div class="form-group">
          <div class="checkbox col-md-12">
            <label>
              <input type="checkbox" value="remember-me"> Recordar usuario
            </label>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12 text-center">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Entrar</button>
          </div>
        </div>

        <hr>

        <!-- <p><a href="#">¿Olvidaste tu contraseña?</a></p> -->

      </form>
    </div>
    <div class="panel-footer text-center">Instituto Politécnico Nacional</div>
  </div>
</div> <!-- /container -->