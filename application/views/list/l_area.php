<table class="table table-striped table-hover">
		<?php $cont=1; ?>
  		<thead>
  			<tr>
  				<th>#</th>	
	  			<th>Area</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach ($area as $item): ?>
	  			<tr>
	  				<td><?php echo $cont; ?>
	  					<input type="hidden" name="idArea" value="<?php echo $item['idArea']; ?>">
	  				</td>	
		  			<td><?php echo $item['nombre']; ?></td>
		  			<td><span class="update_area">Editar</span></td>
		  			<td><span class="delete_area">Eliminar</span></td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>