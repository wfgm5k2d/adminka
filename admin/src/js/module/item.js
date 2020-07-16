import $ from 'jquery';

$(document).ready(function() {

	function loadcontent()
	{
		$('.loadcontent').html("");
		$.ajax({
				url: '../conf/item_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function(jsondata){
					$.each(jsondata,function(indx,element){
						$('.loadcontent').append('<div class="elname"><div class="elname__a">'+element.name+'</div><div class="delete" data-id="'+element.id+'"></div><div class="edit" data-id="'+element.id+'" data-name="'+element.name+'" data-descr="'+element.descript+'" data-content="'+element.content+'" data-price="'+element.price+'" data-oldprice="'+element.oldprice+'" data-art="'+element.art+'" data-size="'+element.size+'" data-color="'+element.color+'" data-parent="'+element.parent+'"></div></div>');
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
		var titleId = $(this).attr('data-id');
		var titleName = $(this).attr('data-name');
		var titleDescript = $(this).attr('data-descr');
		var titleContent = $(this).attr('data-content');
		var titlePrice= $(this).attr('data-price');
		var titleOldPrice = $(this).attr('data-oldprice');
		var titleArt = $(this).attr('data-art');
		var titleSize = $(this).attr('data-size');
		var titleColor = $(this).attr('data-color');
		var titleParent = $(this).attr('data-parent');
        $('.ajax_editblock-id').val(titleId);
        $('.ajax_editblock-name').val(titleName);
        $('.ajax_editblock-descript').val(titleDescript);
        $('.ajax_editblock-content').val(titleContent);
        $('.ajax_editblock-price').val(titlePrice);
        $('.ajax_editblock-oldprice').val(titleOldPrice);
        $('.ajax_editblock-art').val(titleArt);
        $('.ajax_editblock-size').val(titleSize);
        $('.ajax_editblock-color').val(titleColor);
        $('.ajax_editblock-parent').val(titleParent);
	});

    $('.deleteblock-btn').click(function(){
    	var id = $('.deleteblock-id').val();
    	$.ajax({
				url: '../conf/item_delete.php',
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

    $('.check').click(function(){
    	var perem = $(this).val();
    	var peremId = $(this).attr();
    });
    
    $('.ajax_addblock-save').click(function(){
    	var name = $('.ajax_addblock-name').val();
    	var descript = $('.ajax_addblock-descript').val();
    	var content = $('.ajax_addblock-content').val();
    	var price = $('.ajax_addblock-price').val();
    	var oldprice = $('.ajax_addblock-oldprice').val();
    	var art = $('.ajax_addblock-art').val();
    	var size = $('.ajax_addblock-size').val();
    	var color = $('.ajax_addblock-color').val();
    	//var parent = $('.ajax_addblock-parent').val();
    	console.log(name);
    	$.ajax({
				url: '../conf/item_add.php',
				type: 'POST',
				data : 'name='+name+'&descript='+descript+'&content='+content+'&price='+price+'&oldprice='+oldprice+'&art='+art+'&size='+size+'&color='+color,
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
    	var descript = $('.ajax_editblock-descript').val();
    	var content = $('.ajax_editblock-content').val();
    	var price = $('.ajax_editblock-price').val();
    	var oldprice = $('.ajax_editblock-oldprice').val();
    	var art = $('.ajax_editblock-art').val();
    	var size = $('.ajax_editblock-size').val();
    	var color = $('.ajax_editblock-color').val();
    	//var parent = $('.ajax_editblock-parent').val();
    	$.ajax({
				url: '../conf/item_edit.php',
				type: 'POST',
				data : 'id='+id+'&name='+name+'&descript='+descript+'&content='+content+'&price='+price+'&oldprice='+oldprice+'&art='+art+'&size='+size+'&color='+color,
				cache: false,
				success: function(jsondata){
					$('.divright').hide();
					$('.editblock').hide();
					loadcontent();
				}
		});
    });

   $('.tabs1').click(function()
   {
		$('.tabs-2').hide();
		$('.tabs-1').show();
   });
   $('.tabs2').click(function()
   {
		$('.tabs-1').hide();
		$('.tabs-2').show();
   });
});