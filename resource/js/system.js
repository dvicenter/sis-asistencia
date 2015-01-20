$(document).on('ready',function(){

	$('a.list-group-item').on('click',function(e){
		e.preventDefault();
		$('a.list-group-item').removeClass('active');
		$(this).addClass('active');
		var num_mod = $(this).index();
		switch(num_mod){
			case 0: ajax_mod('assistance');break;
			case 1: ajax_mod('practicing');break;
			case 2: ajax_mod('institute');break;
			case 3: ajax_mod('area');break;
		}
	});

	$(document).on('change','#sltAsistio', function() {
		var select = $(this).val();
		var idPracticante = $(this).parent().parent().children('td').eq(0).children('input[name="idPracticante"]').val();
		var idAsistencia = $(this).parent().parent().children('td').eq(0).children('input[name="idAsistencia"]').val();
		var fecha = $('input[name="fecha"]').val();
		
		ajax_ins_asist(idAsistencia,idPracticante,select,fecha);
	
	});

});

function ajax_mod(name_mod){
	$.ajax({
		url: base_url+'mod/'+name_mod,
		type: 'POST'
	}).done(function(data) {
		$('#sec-content').html(data);
	});
}

function ajax_search_pract_date(fecha){
	$.ajax({
		url: base_url+'asist/search/',
		type: 'POST',
		data: {fecha : fecha}
	}).done(function(data) {
		$('.sec-assistence').html(data);
	});
}

function ajax_ins_asist(idAsist,idPract,asist,fecha){
	debugger;
	if (idAsist != '0') {
		$.ajax({
			url: base_url+'asist/upd',
			type: 'POST',
			data: { idAsistencia: "John", location: "Boston" }
		}).done(function(data) {
			//$('#sec-content').html(data);
		});
	}else{
		$.ajax({
			url: base_url+'asist/set',
			type: 'POST',
			dataType: 'json',
			data: { idPracticante: idPract, asistio: asist, fecha: fecha }
		}).done(function(data) {

			ajax_search_pract_date(data[0].fecha);
			console.log(data);
		});
		
	}
}