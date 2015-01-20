<table class="table table-striped table-hover">
		<?php $cont=1; ?>
  		<thead>
  			<tr>
  				<th>#</th>	
	  			<th>Area</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach ($practicante as $item): ?>
	  			<tr>
	  				<td><?php echo $cont; ?>
	  					<input type="hidden" name="idPracticante" value="<?php echo $item['idPracticante']; ?>">
	  				</td>	
		  			<td> 
		  				<?php echo $item['nombre']." ".$item['apellido']; ?>
		  				<input type="hidden" name="tbl_nombre_practicante" value="<?php echo $item['nombre']; ?>" />
		  				<input type="hidden" name="tbl_pellido_practicante" value="<?php echo $item['apellido']; ?>" />
		  			</td>
		  			<td><?php echo $item['fechaInicio']; ?></td>
		  			<td><?php echo $item['fechaFinal']; ?></td>
		  			<td>
		  				<?php echo $item['area']; ?>
		  				<input type="hidden" name="tbl_area" value="<?php echo $item['idArea']; ?>" />
		  			</td>
		  			<td>
		  				<?php echo $item['instituto']; ?>
		  				<input type="hidden" name="tbl_instituto" value="<?php echo $item['idInstituto']; ?>" />
		  			</td>
		  			<td><span class="update_practicante">Editar</span></td>
		  			<td><span class="delete_practicante">Eliminar</span></td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>