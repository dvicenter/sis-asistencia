<section class="sec-filter">
	<input type="hidden" name="idPracticante" >
	<label for="nombre_practicante">Nombre: </label>
	<input type="text" name="nombre_practicante" >
	<label for="apellido_practicante">apellido: </label>
	<input type="text" name="apellido_practicante" >
	<label for="area">Area: </label>
	<select  id="area">
		<?php foreach ($area as $item): ?>
		<option value="<?php echo $item['idArea'] ?>" ><?php echo $item['nombre'] ?></option>
		<?php endforeach ?>
	</select>
	<label for="instituto">Instituto: </label>
	<select id="instituto">
		<?php foreach ($instituto as $item): ?>
		<option value="<?php echo $item['idInstituto'] ?>" ><?php echo $item['nombre'] ?></option>
		<?php endforeach ?>
	</select>
	<label for="fechaInicio">Fecah Inicio: </label>
	<input type="date" name="fechaInicio" >
	<label for="fichaFin">Fecha fin: </label>
	<input type="date" name="fechaFin" >
	<button class="btn btn-default" id="btn_practicante">Guardar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_practicante');?>
</section>