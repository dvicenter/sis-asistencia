<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de Asistencia</title>
	<link rel="stylesheet" href="<?php echo base_url();?>resource/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>resource/css/system.css">
	<link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
	<script> var base_url = "<?php echo base_url();?>"</script>
	<script src="<?php echo base_url();?>resource/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>resource/js/system.js"></script>
	<script src="<?php echo base_url();?>resource/js/crud.js"></script>
</head>
<body>
	<?php $this->load->view('base/v_header'); ?>
	<section id="p_content">
		<?php $this->load->view('base/v_nav'); ?><!--  
	 --><section class="sec-block" id="sec-content">
	 		<div>
				<img src="<?php echo base_url();?>resource/img/util/jpg/logo-login.jpg" alt="">
	 		</div>
		</section>
	</section>
	<?php $this->load->view('base/v_footer'); ?>
</body>
</html>