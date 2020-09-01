import $ from 'jquery';

if($('#options').length > 0)
{
	$(document).ready(function () {

		function loadcontent() {
			$('.loadcontent').html("");
			$.ajax({
				url: '../conf/options_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function (jsondata) {
					$.each(jsondata, function (indx, element) {
						$('.loadcontent').append('<div class="new" data-id="' + element.id + '" data-title="' + element.title + '" data-description="' + element.description + '" data-ogtitle="' + element.og_title + '" data-ogdescription="' + element.og_description + '" data-sitename="' + element.site_name + '" data-keywords="' + element.keywords + '" data-pass="' + element.pass + '">Изменить настройки</div>');
					});
				}
			});
		}

		loadcontent();

		$('body').on('click', '.new', function () {
			$('.divright').fadeIn();
			$('.editblock').fadeIn();


			var title = $(this).attr('data-title');
			var description = $(this).attr('data-description');
			var og_title = $(this).attr('data-ogtitle');
			var og_description = $(this).attr('data-ogdescription');
			var sitename = $(this).attr('data-sitename');
			var keywords = $(this).attr('data-keywords');
			var pass = $(this).attr('data-pass');
			$('.ajax_editblock-title').val(title);
			$('.ajax_editblock-site_name').val(sitename);
			$('.ajax_editblock-description').val(description);
			$('.ajax_editblock-og_title').val(og_title);
			$('.ajax_editblock-og_description').val(og_description);
			$('.ajax_editblock-keywords').val(keywords);
			$('.ajax_editblock-pass').val(pass);
		});
		$('.ajax_editblock-save').click(function () {
			var title = $('.ajax_editblock-title').val();
			var description = $('.ajax_editblock-description').val();
			var og_title = $('.ajax_editblock-og_title').val();
			var og_description = $('.ajax_editblock-og_description').val();
			var sitename = $('.ajax_editblock-site_name').val();
			var keywords = $('.ajax_editblock-keywords').val();
			var pass = $('.ajax_editblock-pass').val();
			$.ajax({
				url: '../conf/options_edit.php',
				type: 'POST',
				data: 'title=' + title + '&description=' + description + '&og_title=' + og_title + '&og_description=' + og_description + '&site_name=' + sitename + '&keywords=' + keywords + '&pass=' + pass,
				cache: false,
				success: function (jsondata) {
					$('.divright').hide();
					$('.editblock').hide();
					loadcontent();
				}
			});
		});
	});
}