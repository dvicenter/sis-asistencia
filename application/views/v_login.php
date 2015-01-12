<?php
	 if ($this->session->userdata("usuario")) 
	 {	$this->data['usuario']=$this->session->userdata("usuario");
	 	$this->data['id_sujeto']=$this->session->userdata("id_sujeto");
	 	$this->load->view('v_panel',$this->data);
	 }
	 else{ 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Acceso Asistencia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>resource/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
</head>
<body>
	<section id="sec-login">
		<img src="<?php echo base_url();?>resource/img/util/jpg/logo-login.jpg">
		<form method="post" action="<?php echo base_url(); ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Usuario</label>
		    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Usuario" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Contraseña" required>
		  </div>
		  <button type="submit" class="btn btn-default">Ingresar</button>
		</form>
	</section>
</body>
</html>
<?php } ?>