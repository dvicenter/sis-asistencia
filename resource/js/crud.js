$(document).on('ready',function(){
	/*validar letra*/

	/*validar numero*/
	
	/*area*/
	$(document).on('click','#btn_area', function() {
		var idArea=$(".sec-filter > input[ name='idArea']").val();
		var area=$("input[name='nombre_area']").val();
		if(idArea=="" || idArea=="NULL"){
			$.ajax({
				url: base_url+'area/set',
				type: 'POST',
				data: { pArea : area }
			}).done(function(data) {
				$('#sec-content').html(data);
			});
		}else{
			$.ajax({
				url: base_url+'area/update',
				type: 'POST',
				data: { pArea : area,pIdArea: idArea }
			}).done(function(data) {
				$('#sec-content').html(data);
				$(".sec-filter  button").text("Guardar");
			});
		}
	});
	$(document).on('click','.update_area', function() {
		var tr=$(this).parent().parent().index();
		var idArea=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idArea']").val();
		var area_nombre=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(2)").html();
		$(".sec-filter > input[ name='idArea']").val(idArea);
		$(".sec-filter  input[ name='nombre_area']").val(area_nombre);
		$(".sec-filter  button").text("Actualizar");
		
	});
	$(document).on('click','.delete_area', function() {
		var tr=$(this).parent().parent().index();
		var idArea=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idArea']").val();
		$.ajax({
			url: base_url+'area/delete',
			type: 'POST',
			data: {pIdArea: idArea }
		}).done(function(data) {
			$('#sec-content').html(data);
		});
		
	});
	/*----------------instituto-------------------------*/
	$(document).on('click','#btn_instituto', function() {
		var idInstituto=$(".sec-filter > input[ name='idInstituto']").val();
		var instituto=$("input[name='nombre_instituto']").val();
		if(idInstituto=="" || idInstituto=="NULL"){
			$.ajax({
				url: base_url+'inst/set',
				type: 'POST',
				data: { pInstituto : instituto }
			}).done(function(data) {
				$('#sec-content').html(data);
			});
		}else{
			$.ajax({
				url: base_url+'inst/update',
				type: 'POST',
				data: { pIdInstituto : idInstituto,pInstituto: instituto }
			}).done(function(data) {
				$('#sec-content').html(data);
				$(".sec-filter  button").text("Guardar");
			});
		}
	});
	$(document).on('click','.update_instituto', function() {
		var tr=$(this).parent().parent().index();
		var idInstituto=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idInstituto']").val();
		var area_nombre=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(2)").html();
		$(".sec-filter > input[ name='idInstituto']").val(idInstituto);
		$(".sec-filter  input[ name='nombre_instituto']").val(area_nombre);
		$(".sec-filter  button").text("Actualizar");
		
	});
	$(document).on('click','.delete_instituto', function() {
		var tr=$(this).parent().parent().index();
		var idInstituto=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idInstituto']").val();
		$.ajax({
			url: base_url+'inst/delete',
			type: 'POST',
			data: {pIdInstituto: idInstituto }
		}).done(function(data) {
			$('#sec-content').html(data);
		});
		
	});
	/*----------------------------practicante------------------------*/
	$(document).on('click','#btn_practicante', function() {
		var idPracticante=$(".sec-filter > input[ name='idPracticante']").val();
		var nombre=$("input[name='nombre_practicante']").val();
		var apellido=$("input[name='apellido_practicante']").val();
		var area=$("#area").val();
		var instituto=$("#instituto").val();
		var fechaInicio=$("input[name='fechaInicio']").val();
		var fechaFinal=$("input[name='fechaFin']").val();
		if(idPracticante=="" || idPracticante=="NULL"){
			$.ajax({
				url: base_url+'practicante/set',
				type: 'POST',
				data: { pNombre : nombre,pApellido:apellido,pFechaInicio:fechaInicio,pFechaFinal:fechaFinal,pArea:area,pInstituto:instituto }
			}).done(function(data) {
				$('#sec-content').html(data);
			});
		}else{
			$.ajax({
				url: base_url+'practicante/update',
				type: 'POST',
				data: {pIdPracticante:idPracticante ,pNombre : nombre,pApellido:apellido,pFechaInicio:fechaInicio,pFechaFinal:fechaFinal,pArea:area,pInstituto:instituto }
			}).done(function(data) {
				$('#sec-content').html(data);
				$(".sec-filter  button").text("Guardar");
			});
		}
	});
	$(document).on('click','.update_practicante', function() {
		var tr=$(this).parent().parent().index();
		var idPracticante=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idPracticante']").val();
		var nombre=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(2) input[ name='tbl_nombre_practicante']").val();
		var apellido=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(2) input[ name='tbl_pellido_practicante']").val();
		var fechaInicio=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(3)").html();
		var fechaFinal=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(4)").html();
		var area=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(5) input[ name='tbl_area']").val();
		var instituto=$("table tbody tr:nth-child("+(tr+1)+") td:nth-child(6) input[ name='tbl_instituto']").val();
		
		$(".sec-filter > input[ name='idPracticante']").val(idPracticante);
		$(".sec-filter  input[ name='nombre_practicante']").val(nombre);
		$(".sec-filter  input[ name='apellido_practicante']").val(apellido);
		$(".sec-filter  input[ name='fechaInicio']").val(fechaInicio);
		$(".sec-filter  input[ name='fechaFin']").val(fechaFinal);
		$(".sec-filter #area > option[value='"+area+"']").attr('selected', 'selected');
		$(".sec-filter #instituto > option[value='"+instituto+"']").attr('selected', 'selected');
		$(".sec-filter  button").text("Actualizar");
		
	});
	$(document).on('click','.delete_practicante', function() {
		var tr=$(this).parent().parent().index();
		var idPracticante=$("table tbody tr:nth-child("+(tr+1)+") input[ name='idPracticante']").val();
		$.ajax({
			url: base_url+'practicante/delete',
			type: 'POST',
			data: {pIdPracticante: idPracticante }
		}).done(function(data) {
			$('#sec-content').html(data);
		});
		
	});
});