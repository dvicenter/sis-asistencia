<section class="sec-filter">
	<input type="hidden" name="idInstituto" >
	<label for="nombre">Instituto: </label>
	<input type="text" class="form-control" name="nombre_instituto" >
	<button class="btn btn-default" id="btn_instituto">Guardar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_instituto');?>
</section>