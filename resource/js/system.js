$(document).on('ready',function(){

	$('a.list-group-item').on('click',function(){
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

});

function ajax_mod(name_mod){
	$.ajax({
		url: base_url+'mod/'+name_mod,
		type: 'POST',
		context: document.body
	}).done(function(data) {
		$('#sec-content').html(data);
	});
}