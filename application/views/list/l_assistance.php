<table class="table table-striped">
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
	  				<td><?php echo $cont; ?></td>	
		  			<td><?php echo $item['apellido'].' '.$item['nombre']; ?></td>
		  			<td><?php echo $item['area']; ?></td>
		  			<td><?php echo $item['instituto']; ?></td>
		  			<td><?php echo $item['fechaInicio']; ?></td>
		  			<td><?php echo $item['fechaFinal']; ?></td>
		  			<td>Asistencia</td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>