<section class="sec-filter">
	<input type="hidden" name="idPracticante" >
	<label for="nombre_practicante">Nombre: </label>
	<input type="text" class="form-control" name="nombre_practicante" >
	<label for="apellido_practicante">apellido: </label>
	<input type="text" class="form-control" name="apellido_practicante" >
	<label for="area">Area: </label>
	<select  id="area" class="form-control">
		<?php foreach ($area as $item): ?>
		<option value="<?php echo $item['idArea'] ?>" ><?php echo $item['nombre'] ?></option>
		<?php endforeach ?>
	</select><br>
	<label for="instituto">Instituto: </label>
	<select id="instituto" class="form-control">
		<?php foreach ($instituto as $item): ?>
		<option value="<?php echo $item['idInstituto'] ?>" ><?php echo $item['nombre'] ?></option>
		<?php endforeach ?>
	</select>
	<label for="fechaInicio">Fecah Inicio: </label>
	<input type="date" class="form-control" name="fechaInicio" >
	<label for="fichaFin">Fecha fin: </label>
	<input type="date" class="form-control" name="fechaFin" >
	<button class="btn btn-default" id="btn_practicante">Guardar</button>
</section>
<section class="sec-assistence">
	<?php $this->load->view('list/l_practicante');?>
</section>