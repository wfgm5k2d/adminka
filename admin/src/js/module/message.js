import $ from 'jquery';

$(document).ready(function() {

	function loadcontent()
	{
		$('.loadcontent').html("");
		$.ajax({
				url: '../conf/message_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function(jsondata){
					$.each(jsondata,function(indx,element){
						$('.loadcontent').append('<div class="elname">Новое уведомление!<div class="delete" data-id="'+element.id+'"></div><div class="show" data-id="'+element.id+'" data-message="'+element.message+'" data-name="'+element.name+'" data-lastname="'+element.lastname+'" data-color="'+element.color+'" data-size="'+element.size+'" data-type="'+element.type+'" data-theme="'+element.theme+'" data-material="'+element.material+'" data-email="'+element.email+'" data-phone="'+element.phone+'" data-adress="'+element.adress+'"></div></div>');
					});
				}
		});
	}
	loadcontent();

	$('body').on('click','.delete',function(){
		$('.divright').fadeIn();
		$('.delblock').fadeIn();
		$('.addblock').hide();
		 let title = $(this).attr('data-id'); // this showed up as the text I was expecting
        $('.deleteblock-id').val(title);
	});

    $('.deleteblock-btn').click(function(){
    	let id = $('.deleteblock-id').val();
    	$.ajax({
				url: '../conf/message_delete.php',
				type: 'POST',
				data : 'id='+id,
				cache: false,
				success: function(jsondata){
					$('.divright').hide();
					$('.delblock').hide();
					loadcontent();
				}
		});
    });

	$('body').on('click','.show',function(){
		$('.divright').fadeIn();
		$('.addblock').fadeIn();
		$('.delblock').hide();

		let message = $(this).attr('data-message'),
			name = $(this).attr('data-name'),
			lastname = $(this).attr('data-lastname'),
			color = $(this).attr('data-color'),
			size = $(this).attr('data-size'),
			type = $(this).attr('data-type'),
			theme = $(this).attr('data-theme'),
			material = $(this).attr('data-material'),
			email = $(this).attr('data-email'),
			phone = $(this).attr('data-phone'),
			adress = $(this).attr('data-adress');

		$('.show-message').val(message);
		$('.show-name').val(name);
		$('.show-lastname').val(lastname);
		$('.show-color').val(color);
		$('.show-size').val(size);
		$('.show-type').val(type);
		$('.show-theme').val(theme);
		$('.show-material').val(material);
		$('.show-email').val(email);
		$('.show-phone').val(phone);
		$('.show-adress').val(adress);
	});

});