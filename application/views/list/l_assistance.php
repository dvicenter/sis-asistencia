<table class="table table-striped table-hover">
		<?php $cont=1; ?>
  		<thead>
  			<tr>
  				<th>#</th>	
	  			<th>Nombres y Apellidos</th>
	  			<th>Area</th>
	  			<th>Institucion</th>
	  			<th>F. Ingreso</th>
	  			<th>F. Termino</th>
	  			<th>Asistencia</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach ($practicantes as $item): ?>
	  			<tr>
	  				<td><?php echo $cont; ?>
	  					<input type="hidden" name="idPracticante" value="<?php echo $item['idPracticante']; ?>">
	  				</td>	
		  			<td><?php echo $item['apellido'].' '.$item['nombre']; ?></td>
		  			<td><?php echo $item['area']; ?></td>
		  			<td><?php echo $item['instituto']; ?></td>
		  			<td><?php echo $item['fechaInicio']; ?></td>
		  			<td><?php echo $item['fechaFinal']; ?></td>
		  			<td>
		  				<select name="asisitio" class="form-control" id="sltAsistio">
		  					<option value="null">Marcar Asistencia</option>
		  					<option class="asis-f" value="0">Falto</option>
		  					<option class="asis-a" value="1">Asistio</option>
		  				</select>
		  			</td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>