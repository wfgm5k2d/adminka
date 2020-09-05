import $ from 'jquery';

if($('#options').length > 0)
{
	$(document).ready(function () {

		function loadcontent() {
			$('.loadcontent').html("");
			$.ajax({
				url: 'conf/options_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function (jsondata) {
					$.each(jsondata, function (indx, element) {
						$('.loadcontent').append('<div class="new" data-id="' + element.id + '" data-title="' + element.title + '" data-email="' + element.email + '" data-description="' + element.description + '" data-ogtitle="' + element.og_title + '" data-ogdescription="' + element.og_description + '" data-sitename="' + element.site_name + '" data-keywords="' + element.keywords + '" data-pass="' + element.pass + '">Изменить настройки</div>');
					});
				}
			});
		}

		loadcontent();

		$('body').on('click', '.new', function () {
			$('.divright').fadeIn();
			$('.editblock').fadeIn();


			let title = $(this).attr('data-title');
			let email = $(this).attr('data-email');
			let description = $(this).attr('data-description');
			let og_title = $(this).attr('data-ogtitle');
			let og_description = $(this).attr('data-ogdescription');
			let sitename = $(this).attr('data-sitename');
			let keywords = $(this).attr('data-keywords');
			let pass = $(this).attr('data-pass');
			$('.ajax_editblock-title').val(title);
			$('.ajax_editblock-email').val(email);
			$('.ajax_editblock-site_name').val(sitename);
			$('.ajax_editblock-description').val(description);
			$('.ajax_editblock-og_title').val(og_title);
			$('.ajax_editblock-og_description').val(og_description);
			$('.ajax_editblock-keywords').val(keywords);
			$('.ajax_editblock-pass').val(pass);
		});
		$('.ajax_editblock').on('submit', function (e) {
			e.preventDefault();
			let $form = $(this).serialize();

			$.ajax({
				url: 'conf/options_edit.php',
				type: 'POST',
				data: $form,
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