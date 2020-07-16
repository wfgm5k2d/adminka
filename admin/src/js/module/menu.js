import $ from 'jquery';

$(document).ready(function() {

	function loadcontent()
	{
		$('.loadcontent').html("");
		$.ajax({
			url: '../conf/menu_load.php',
			type: 'POST',
			data: 'jsondata',
			cache: false,
			success: function(jsondata){
				$.each(jsondata,function(indx,element){
					$('.loadcontent').append('<div class="elname"><div class="elname__a"><a href="?id='+element.id+'&parent='+element.parent+'">'+element.name+'</a></div><div class="delete" data-id="'+element.id+'"></div><div class="edit" data-id="'+element.id+'" data-name="'+element.name+'" data-parent="'+element.parent+'"></div><a href="?id='+element.id+'&parent='+element.parent+'"><div class="glass" data-id="'+element.id+'"></div></a></div>');
				});
			}
		});
	}

	loadcontent();

	function loadcontentplus()
	{
		$('.loadcontentplus').html("");
		$.ajax({
			url: '../conf/menu_load2.php',
			type: 'POST',
			data: 'jsondata',
			cache: false,
			success: function(jsondata){
				$.each(jsondata,function(indx,element){
					$('.loadcontentplus').append('<div class="elnameplus"><div class="elname__a">'+element.namedop+'</div><div class="delete" data-id="'+element.iddop+'"></div><div class="editplus" data-id="'+element.iddop+'" data-name="'+element.namedop+'"></div></div>');
				});
			}
		});
	}

	loadcontentplus();

	$('.new').click(function(){
		$('.divright').fadeIn();
		$('.addblock').fadeIn();
		$('.addblockplus').hide();
		$('.delblock').hide();
		$('.editblock').hide();
		$('.editblockplus').hide();
	});

	$('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function(){
		$('.divright').fadeOut();
	});

	$('body').on('click','.glass',function(){
		$('.divright').fadeIn();
		$('.addblockplus').fadeIn();
		$('.addblock').hide();
		$('.delblock').hide();
		$('.editblock').hide();
		$('.editblockplus').hide();
		idglass = $(this).attr('data-id'); // this showed up as the text I was expecting
	});

	$('body').on('click','.delete',function(){
		$('.divright').fadeIn();
		$('.delblock').fadeIn();
		$('.addblock').hide();
		$('.editblock').hide();
		$('.addblockplus').hide();
		$('.editblockplus').hide();
		var title = $(this).attr('data-id'); // this showed up as the text I was expecting
		$('.deleteblock-id').val(title);
	});

	$('body').on('click','.edit',function(){
		$('.divright').fadeIn();
		$('.editblock').fadeIn();
		$('.delblock').hide();
		$('.addblock').hide();
		$('.addblockplus').hide();
		$('.editblockplus').hide();
		var titleId = $(this).attr('data-id');
		var titleName = $(this).attr('data-name');
		$('.ajax_editblock-id').val(titleId);
		$('.ajax_editblock-name').val(titleName);
	});

	$('body').on('click','.editplus',function(){
		$('.divright').fadeIn();
		$('.editblockplus').fadeIn();
		$('.editblock').hide();
		$('.delblock').hide();
		$('.addblock').hide();
		$('.addblockplus').hide();
		var titleId = $(this).attr('data-id');
		var titleName = $(this).attr('data-name');
		$('.ajax_editblock-id-plus').val(titleId);
		$('.ajax_editblock-name-plus').val(titleName);
	});

	$('.deleteblock-btn').click(function(){
		var id = $('.deleteblock-id').val();
		$.ajax({
			url: '../conf/menu_delete.php',
			type: 'POST',
			data : 'id='+id,
			cache: false,
			success: function(jsondata){
				$('.divright').hide();
				$('.delblock').hide();
				loadcontent();
				loadcontentplus();
			}
		});
	});

	$('.ajax_addblock-save').click(function(){
		var name = $('.ajax_addblock-name').val();
		var parent = $('.ajax_addblock-parent').val();
		$.ajax({
			url: '../conf/menu_add.php',
			type: 'POST',
			data : 'name='+name+'&parent='+parent,
			cache: false,
			success: function(jsondata){
				$('.divright').hide();
				$('.addblock').hide();
				loadcontent();
				loadcontentplus();
			}
		});
	});

	$('.ajax_addblock-save-plus').click(function(){
		var name = $('.ajax_addblock-name-plus').val();
		var parent = idglass;
		$.ajax({
			url: '../conf/menu_add.php',
			type: 'POST',
			data : 'name='+name+'&parent='+parent,
			cache: false,
			success: function(jsondata){
				$('.divright').hide();
				$('.addblock').hide();
				loadcontent();
				loadcontentplus();
			}
		});
	});

	$('.ajax_editblock-save').click(function(){
		var id = $('.ajax_editblock-id').val();
		var name = $('.ajax_editblock-name').val();
		$.ajax({
			url: '../conf/menu_edit.php',
			type: 'POST',
			data : 'id='+id+'&name='+name,
			cache: false,
			success: function(jsondata){
				$('.divright').hide();
				$('.editblock').hide();
				loadcontent();
				loadcontentplus();
			}
		});
	});

	$('.ajax_editblock-save-plus').click(function(){
		var id = $('.ajax_editblock-id-plus').val();
		var name = $('.ajax_editblock-name-plus').val();
		$.ajax({
			url: '../conf/menu_edit.php',
			type: 'POST',
			data : 'id='+id+'&name='+name,
			success: function(jsondata){
				$('.divright').hide();
				$('.editblock').hide();
				loadcontent();
				loadcontentplus();
			}
		});
	});
});