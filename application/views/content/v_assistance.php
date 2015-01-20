<section class="sec-filter">
	<label for="fecha">Fecha</label>
	<input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" >
	<button class="btn btn-default" id="search-pract">Buscar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_assistance');?>
</section>