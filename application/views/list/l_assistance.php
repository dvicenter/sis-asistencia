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
	  					<input type="hidden" name="idAsistencia" value="<?php echo ($item['idAsistencia'] == null)? 0 : $item['idAsistencia']; ?>">
	  				</td>	
		  			<td><?php echo $item['apellido'].' '.$item['nombre']; ?></td>
		  			<td><?php echo $item['area']; ?></td>
		  			<td><?php echo $item['instituto']; ?></td>
		  			<td><?php echo $item['fechaInicio']; ?></td>
		  			<td><?php echo $item['fechaFinal']; ?></td>
		  			<td>
		  				<select name="asisitio" class="form-control" id="sltAsistio">
		  					<option value="null" <?php echo ($item['asistio']==null)?'selected':'';?> >Marcar Asistencia</option>
		  					<option class="asis-f" value="0" <?php echo ($item['asistio']=='0')?'selected':'';?> >Falto</option>
		  					<option class="asis-a" value="1" <?php echo ($item['asistio']=='1')?'selected':'';?> >Asistio</option>
		  				</select>
		  			</td>
	  			</tr>	
	  			<?php $cont++; ?>
  			<?php endforeach ?>
  		</tbody>
</table>