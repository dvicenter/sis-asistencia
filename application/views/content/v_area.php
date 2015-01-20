<section class="sec-filter">
	<input type="hidden" name="idArea" >
	<label for="nombre">Instituto: </label>
	<input type="text" name="nombre_instituto" >
	<button class="btn btn-default" id="btn_area">Guardar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_area');?>
</section>