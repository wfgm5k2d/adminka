import $ from 'jquery';

if($('#menu').length > 0)
{
	$(document).ready(function () {
		let getParams = (new URL(document.location)).searchParams;
		let GET_VALUE = getParams.get("id");
		$(".ajax_addblock-parent").val(GET_VALUE);

		function loadcontent() {
			$('.loadcontent').html("");
			$.ajax({
				url: 'conf/menu_load.php',
				type: 'POST',
				data: 'jsondata',
				cache: false,
				success: function (jsondata) {
					$.each(jsondata, function (indx, element) {
						$('.loadcontent').append('<div class="elname"><div class="elname__a"><a href="?id=' + element.id + '&parent=' + element.parent + '">' + element.name + '</a></div><div class="delete" data-id="' + element.id + '"></div><div class="edit" data-id="' + element.id + '" data-name="' + element.name + '" data-parent="' + element.parent + '"></div><a href="?id=' + element.id + '&parent=' + element.parent + '"><div class="glass" data-id="' + element.id + '"></div></a></div>');
					});
				}
			});
		}

		loadcontent();

		function loadcontentplus() {
			$('.loadcontentplus').html("");
			$.ajax({
				url: 'conf/menu_load2.php',
				type: 'POST',
				data: 'id='+GET_VALUE,
				cache: false,
				success: function (jsondata) {
					$.each(jsondata, function (indx, element) {
						$('.loadcontentplus').append('<div class="elnameplus"><div class="elname__a">' + element.name + '</div><div class="delete" data-id="' + element.id + '"></div><div class="editplus" data-id="' + element.id + '" data-name="' + element.name + '"></div></div>');
					});
				}
			});
		}

		loadcontentplus();

		$('.new').click(function () {
			$('.divright').fadeIn();
			$('.addblock').fadeIn();
			$('.addblockplus').hide();
			$('.delblock').hide();
			$('.editblock').hide();
			$('.editblockplus').hide();
		});

		$('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function () {
			$('.divright').fadeOut();
		});

		$('body').on('click', '.glass', function () {
			$('.divright').fadeIn();
			$('.addblockplus').fadeIn();
			$('.addblock').hide();
			$('.delblock').hide();
			$('.editblock').hide();
			$('.editblockplus').hide();
		});

		$('body').on('click', '.delete', function () {
			$('.divright').fadeIn();
			$('.delblock').fadeIn();
			$('.addblock').hide();
			$('.editblock').hide();
			$('.addblockplus').hide();
			$('.editblockplus').hide();
			var title = $(this).attr('data-id'); // this showed up as the text I was expecting
			$('.deleteblock-id').val(title);
		});

		$('body').on('click', '.edit', function () {
			$('.divright').fadeIn();
			$('.editblock').fadeIn();
			$('.delblock').hide();
			$('.addblock').hide();
			var titleId = $(this).attr('data-id');
			var titleName = $(this).attr('data-name');
			$('.ajax_editblock-id').val(titleId);
			$('.ajax_editblock-name').val(titleName);
		});

		$('body').on('click', '.editplus', function () {
			$('.divright').fadeIn();
			$('.editblock').fadeIn();
			$('.delblock').hide();
			$('.addblock').hide();
			var titleId = $(this).attr('data-id');
			var titleName = $(this).attr('data-name');
			$('.ajax_editblock-id-plus').val(titleId);
			$('.ajax_editblock-name-plus').val(titleName);
		});

		$('.deleteblock-btn').click(function () {
			let id = $('.deleteblock-id').val();
			$.ajax({
				url: 'conf/menu_delete.php',
				type: 'POST',
				data: 'id=' + id,
				cache: false,
				success: function (jsondata) {
					$('.divright').hide();
					$('.delblock').hide();
					loadcontent();
					loadcontentplus();
				}
			});
		});

		$(".ajax_addblock").on("submit", function (event) {
			event.preventDefault();
			let data = $(this).serialize();

			$.ajax({
				url: 'conf/menu_add.php',
				type: 'POST',
				data: data,
				cache: false,
				success: function (jsondata) {
					$('.divright').hide();
					$('.addblock').hide();
					$('.ajax_addblock')[0].reset();
					loadcontent();
					loadcontentplus();
				}
			});
		});

		$('.ajax_editblock').on("submit", function (event) {
			event.preventDefault();
			let data = $(this).serialize();

			$.ajax({
				url: 'conf/menu_edit.php',
				type: 'POST',
				data: data,
				cache: false,
				success: function (jsondata) {
					$('.divright').hide();
					$('.editblock').hide();
					loadcontent();
					loadcontentplus();
				}
			});
		});
	});
}