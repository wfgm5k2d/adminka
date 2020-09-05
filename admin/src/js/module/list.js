import $ from 'jquery';

if($('#list').length > 0)
{
    $(document).ready(function () {
        let getParams = (new URL(document.location)).searchParams;
        let GET_VALUE = getParams.get("id");
        $(".ajax_addblock-parent").val(GET_VALUE);

        function loadcontent() {
            $('.loadcontent').html("");
            $.ajax({
                url: 'conf/list_load.php',
                type: 'POST',
                data: 'jsondata',
                cache: false,
                success: function (jsondata) {
                    $.each(jsondata, function (indx, element) {
                        $('.loadcontent').append("<div class='elname'><div class='elname__a'><a href='?id=" + element.id + "&parent=" + element.parent + "'>" + element.name + "</a></div><div class='delete' data-id='" + element.id + "'></div><div class='edit' data-id='" + element.id + "' data-name='" + element.name + "' data-parent='" + element.parent + "' data-image='" + element.img + "' data-descript='" + element.descript + "'  data-content='" + element.content + "'></div><a href='?id=" + element.id + "&parent=" + element.parent + "'><div class='glass' data-id='" + element.id + "'></div></a></div>");
                    });
                }
            });
        }

        loadcontent();

        function loadcontentplus() {
            $('.loadcontentplus').html("");
            $.ajax({
                url: 'conf/list_load2.php',
                type: 'POST',
                data: 'id='+GET_VALUE,
                cache: false,
                success: function (jsondata) {
                    $.each(jsondata, function (indx, element) {
                        $('.loadcontentplus').append("<div class='elnameplus'><div class='elname__a'>" + element.name + "</div><div class='delete' data-id='" + element.id + "'></div><div class='editplus' data-id='" + element.id + "' data-name='" + element.name + "' data-descript='" + element.descript + "' data-content='" + element.content + "' data-image='" + element.img + "'></div></div>");
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
            $('.ajax_addblock-name, .ajax_addblock-name-plus').val('');
        });

        $('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function () {
            $('.divright').fadeOut();
        });

        $('body').on('click', '.glass', function () {
            //$('.divright').fadeIn();
            $('.addblockplus').fadeIn();
            $('.addblock').hide();
            $('.delblock').hide();
            $('.editblock').hide();
            $('.editblockplus').hide();
            let idglass = $(this).attr('data-id'); // this showed up as the text I was expecting
        });

        $('body').on('click', '.delete', function () {
            $('.divright').fadeIn();
            $('.delblock').fadeIn();
            $('.addblock').hide();
            $('.editblock').hide();
            $('.addblockplus').hide();
            $('.editblockplus').hide();
            let title = $(this).attr('data-id'); // this showed up as the text I was expecting
            $('.deleteblock-id').val(title);
        });

        $('body').on('click', '.edit, .editplus', function () {
            $('#description_editor').prev().text('');
            $('#content_editor').prev().text('');
            $('.divright').fadeIn();
            $('.editblock').fadeIn();
            $('.delblock').hide();
            $('.addblock').hide();
            $('.addblockplus').hide();
            $('.editblockplus').hide();
            let titleId = $(this).data('id');
            let titleName = $(this).data('name');
            let editDescription = $(this).data('descript');
            let editContent = $(this).data('content');
            let editImage = $(this).data('image');
            $('.ajax_editblock-id').val(titleId);
            $('.ajax_editblock-name').val(titleName);
            $('.ajax_editblock-descript, .ajax_editblock-content').prev().text('');
            $('.ajax_editblock-descript-plus').text(editDescription);
            $('.ajax_editblock-content-plus').text(editContent);
            $('.seeImage-image').css('background', 'url("/upload/'+editImage+'")');
            $('.form-edit-img').val(titleId);
        });

        $('body').on('click', '.editplus', function () {
            $('#description_editor').prev().text('');
            $('#content_editor').prev().text('');
            $('.divright').fadeIn();
            $('.editblockplus').fadeIn();
            $('.editblock').hide();
            $('.delblock').hide();
            $('.addblock').hide();
            $('.addblockplus').hide();
            let titleId = $(this).attr('data-id');
            let titleName = $(this).attr('data-name');
            let editDescription = $(this).attr('data-descript');
            let editContent = $(this).attr('data-content');
            let editImage = $(this).data('image');
            $('.ajax_editblock-id-plus').val(titleId);
            $('.ajax_editblock-name-plus').val(titleName);
            $('.ajax_editblock-descript-plus, .ajax_editblock-content-plus').prev().text('');
            $('.ajax_editblock-descript-plus').prev().append(editDescription);
            $('.ajax_editblock-content-plus').prev().append(editContent);
            $('.seeImage-image').css('background', 'url("/upload/'+editImage+'")');
            $('.form-edit-img').val(titleId);
        });

        $('.deleteblock-btn').click(function () {
            let id = $('.deleteblock-id').val();
            let idPlus = $('.delete').data('id');
            let ID = null;

            if(id != '')
                ID = id;
            else
                ID = idPlus;

            $.ajax({
                url: 'conf/list_delete.php',
                type: 'POST',
                data: 'id=' + ID,
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.delblock').hide();
                    loadcontent();
                    loadcontentplus();
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
                url: 'conf/list_add.php',
                type: 'POST',
                returnType: 'json',
                data: data,
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.addblock').hide();
                    $('.ajax_addblock')[0].reset();
                    loadcontent();
                    loadcontentplus();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('.ajax_editblock').on("submit", function (event) {
            event.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                url: 'conf/list_edit.php',
                type: 'POST',
                data: data,
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.editblock').hide();
                    $('.ajax_editblock')[0].reset();
                    loadcontent();
                    loadcontentplus();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

    });
}