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
			case 4: ajax_mod('report');break;
			case 5: ajax_mod('report-asist');break;
		}
	});

	$(document).on('change','#sltAsistio', function() {
		var select = $(this).val();
		var idPracticante = $(this).parent().parent().children('td').eq(0).children('input[name="idPracticante"]').val();
		var idAsistencia = $(this).parent().parent().children('td').eq(0).children('input[name="idAsistencia"]').val();
		var fecha = $('input[name="fecha"]').val();
		
		ajax_ins_asist(idAsistencia,idPracticante,select,fecha);
	
	});

	$(document).on('click','#search-pract', function(){
		var fecha = $('input[name="fecha"]').val();
		ajax_search_pract_date(fecha);
	});

	$(document).on('keyup','#inp-practicantes',function(){
		var pNombre= $(this).val();
		ajax_search_pract_report(pNombre);
	});

	$(document).on('click','.btn-generate',function(){
		var idPracticante = $(this).parent().parent().children('td').eq(0).children('input[name="idPracticante"]').val();
		ajax_report_asist(idPracticante);
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

function ajax_search_pract_report(pNombre){
	$.ajax({
		url: base_url+'report/get',
		type: 'POST',
		data: {pNombre :pNombre }
	}).done(function(data) {
		$('.sec-practicantes').html(data);
	});
}

function ajax_report_asist(idPract){
	$.ajax({
		url: base_url+'report/asist/'+idPract,
		type: 'POST',
		beforeSend: function( xhr ) {
			$('#report').addClass('loading');
		}
	}).done(function(data) {
		 $('#report').removeClass('loading');
		 $('#report').attr('src',base_url+'report/asist/'+idPract);
		 $('#report').css('display','block');
	});
}

function ajax_ins_asist(idAsist,idPract,asist,fecha){

	if (idAsist != '0') {
		$.ajax({
			url: base_url+'asist/upd',
			type: 'POST',
			data: { idAsistencia: idAsist, asistio: asist, fecha: fecha }
		}).done(function(data) {
			console.log('update');
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