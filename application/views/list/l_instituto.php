<table class="table table-striped table-hover">
		<?php $cont=1; ?>
  		<thead>
  			<tr>
  				<th>#</th>	
	  			<th>Instituto</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach ($instituto as $item): ?>
	  			<tr>
	  				<td><?php echo $cont; ?>
	  					<input type="hidden" name="idInstituto" value="<?php echo $item['idInstituto']; ?>">
	  				</td>	
		  			<td><?php echo $item['nombre']; ?></td>
		  			<td><span class="update_instituto">Editar</span></td>
		  			<td><span class="delete_instituto">Eliminar</span></td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>