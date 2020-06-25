$(document).ready(function() {

	function loadcontent()
	{
		$('.loadcontent').html("");
		$.ajax({
				url: '../conf/block_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function(jsondata){
					$.each(jsondata,function(indx,element){
						$('.loadcontent').append('<div class="elname"><div class="elname__a">'+element.name+'</div><div class="delete" data-id="'+element.id+'"></div><div class="edit" data-id="'+element.id+'" data-name="'+element.name+'"></div></div>');
					});
				}
		});
	}

	loadcontent();

	$('.new').click(function(){
		$('.divright').fadeIn();
		$('.addblock').fadeIn();
		$('.delblock').hide();
		$('.editblock').hide();
	});
	$('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function(){
		$('.divright').fadeOut();
	});

	$('body').on('click','.delete',function(){
		$('.divright').fadeIn();
		$('.delblock').fadeIn();
		$('.addblock').hide();
		$('.editblock').hide();
		 var title = $(this).attr('data-id'); // this showed up as the text I was expecting
        $('.deleteblock-id').val(title);
	});

	$('body').on('click','.edit',function(){
		$('.divright').fadeIn();
		$('.editblock').fadeIn();
		$('.delblock').hide();
		$('.addblock').hide();
		var titleId = $(this).attr('data-id'); // this showed up as the text I was expecting
		var titleName = $(this).attr('data-name'); // this showed up as the text I was expecting
        $('.ajax_editblock-id').val(titleId);
        $('.ajax_editblock-name').val(titleName);
	});

    $('.deleteblock-btn').click(function(){
    	var id = $('.deleteblock-id').val();
    	$.ajax({
				url: '../conf/block_delete.php',
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

    $('.ajax_addblock-save').click(function(){
    	var name = $('.ajax_addblock-name').val();
		var ident = $('.ajax_addblock-ident').val();
    	$.ajax({
				url: '../conf/block_add.php',
				type: 'POST',
				data : 'name='+name+'&ident='+ident,
				cache: false,
				success: function(jsondata){
					$('.divright').hide();
					$('.addblock').hide();
					loadcontent();
				}
		});
    });

    $('.ajax_editblock-save').click(function(){
    	var id = $('.ajax_editblock-id').val();
    	var name = $('.ajax_editblock-name').val();
    	$.ajax({
				url: '../conf/block_edit.php',
				type: 'POST',
				data : 'name='+name+'&id='+id,
				cache: false,
				success: function(jsondata){
					$('.divright').hide();
					$('.editblock').hide();
					loadcontent();
				}
		});
    });
});