<section class="sec-filter">
	<input type="hidden" name="idArea" >
	<label for="nombre">Area: </label>
	<input type="text" class="form-control" name="nombre_area" >
	<button class="btn btn-default" id="btn_area">Guardar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_area');?>
</section>