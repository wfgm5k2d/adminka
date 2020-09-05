import $ from 'jquery';

if($('#block').length > 0)
{
    $(document).ready(function () {
        function loadcontent() {
            $('.loadcontent').html("");

            $.ajax({
                url: 'conf/block_load.php',
                type: 'POST',
                data: 'jsondata',
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    $.each(jsondata, function (indx, element) {
                        $('.loadcontent').append('<div class="elname"><div class="elname__a">' + element.name + '</div><div class="delete" data-id="' + element.id + '"></div><div class="edit" data-id="' + element.id + '" data-name="' + element.name + '" data-value="' + element.value + '"></div></div>');
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        loadcontent();

        $('.new').click(function () {
            $('.divright').fadeIn();
            $('.addblock').fadeIn();
            $('.delblock').hide();
            $('.editblock').hide();
        });
        $('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function () {
            $('.divright').fadeOut();
        });

        $('body').on('click', '.delete', function () {
            $('.divright').fadeIn();
            $('.delblock').fadeIn();
            $('.addblock').hide();
            $('.editblock').hide();
            let title = $(this).attr('data-id');
            $('.deleteblock-id').val(title);
        });

        $('body').on('click', '.edit', function () {
            $('.divright').fadeIn();
            $('.editblock').fadeIn();
            $('.delblock').hide();
            $('.addblock').hide();
            let id = $(this).attr('data-id');
            let value = $(this).attr('data-value');
            $('.ajax_editblock-id').val(id);
            $('.ajax_editblock-value').val(value);
        });

        $('.deleteblock-btn').click(function () {
            let id = $('.deleteblock-id').val();
            $.ajax({
                url: 'conf/block_delete.php',
                type: 'POST',
                data: 'id=' + id,
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.delblock').hide();
                    loadcontent();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $(".ajax_addblock").on("submit", function (event) {
            event.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                url: 'conf/block_add.php',
                type: 'POST',
                returnType: 'json',
                data: data,
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.addblock').hide();
                    $('.ajax_addblock')[0].reset();
                    loadcontent();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('.editblock').on("submit", function (event) {
            event.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                url: 'conf/block_edit.php',
                type: 'POST',
                data: data,
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.editblock').hide();
                    loadcontent();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
}