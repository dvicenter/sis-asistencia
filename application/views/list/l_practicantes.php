<table class="table table-striped table-hover">
		<?php $cont=1; ?>
  		<thead>
  			<tr>
  				<th>#</th>	
	  			<th>Nombres y Apellidos</th>
	  			<th>Generar</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach ($practicantes as $item): ?>
	  			<tr>
	  				<td><?php echo $cont; ?>
	  					<input type="hidden" name="idPracticante" value="<?php echo $item['idPracticante']; ?>">
	  				</td>	
		  			<td><?php echo $item['apellido'].' '.$item['nombre']; ?></td>
		  			<td><button class="btn btn-warning btn-generate" >Generar</button></td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>