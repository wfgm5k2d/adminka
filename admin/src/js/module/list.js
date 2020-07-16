
import $ from 'jquery';

let url = window.location.href;

//Обрезаем конец:
var from = url.search('admin/'); 
var to = url.length;
let newstr = url.substring(from,to);

const PATH = newstr.split('_view')[0];
if (PATH == 'admin/list')
{
$(document).ready(function () {
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
            data: 'jsondata',
            cache: false,
            success: function (jsondata) {
                $.each(jsondata, function (indx, element) {
                    $('.loadcontentplus').append("<div class='elnameplus'><div class='elname__a'>" + element.namedop + "</div><div class='delete' data-id='" + element.iddop + "'></div><div class='editplus' data-id='" + element.iddop + "' data-name='" + element.namedop + "' data-image='" + element.img + "' data-descript='" + element.descriptdop + "' data-content='" + element.contentdop + "'></div></div>");
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
        idglass = $(this).attr('data-id'); // this showed up as the text I was expecting
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

    $('body').on('click', '.edit', function () {
        $('#description_editor').prev().text('');
        $('#content_editor').prev().text('');
        $('.divright').fadeIn();
        $('.editblock').fadeIn();
        $('.delblock').hide();
        $('.addblock').hide();
        $('.addblockplus').hide();
        $('.editblockplus').hide();
        let titleId = $(this).attr('data-id');
        let titleName = $(this).attr('data-name');
        let editDescription = $(this).attr('data-descript');
        let editContent = $(this).attr('data-content');
        let image = $(this).attr('data-image');
        $('.ajax_editblock-id').val(titleId);
        $('.ajax_editblock-name').val(titleName);
        $('.ajax_editblock-descript, .ajax_editblock-content').prev().text('');
        $('.ajax_editblock-descript').prev().append(editDescription);
        $('.ajax_editblock-content').prev().append(editContent);
        $('.seeImage').find('.seeImage-image').detach();
        if (image)
            $('.seeImage').append('<div class="seeImage-image" style="background: url(\'../../../upload/' + image + '\') center center;"><div class="seeImage-delete"></div></div>')
        else
            $('.seeImage').append('');
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
        let image = $(this).attr('data-image')
        $('.ajax_editblock-id-plus').val(titleId);
        $('.ajax_editblock-name-plus').val(titleName);
        $('.ajax_editblock-descript-plus, .ajax_editblock-content-plus').prev().text('');
        $('.ajax_editblock-descript-plus').prev().append(editDescription);
        $('.ajax_editblock-content-plus').prev().append(editContent);
        $('.seeImage').find('.seeImage-image').detach();
        if (image)
            $('.seeImage').append('<div class="seeImage-image" style="background: url(\'../../../upload/' + image + '\') center center;"><div class="seeImage-delete"></div></div>')
        else
            $('.seeImage').append('');
    });

    $('.deleteblock-btn').click(function () {
        let id = $('.deleteblock-id').val();
        $.ajax({
            url: 'conf/list_delete.php',
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
                loadcontent();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });

    $('.ajax_addblock-save-plus').click(function () {
        let name = $('.ajax_addblock-name-plus').val();
        let descript = $('.ajax_addblock-descript-plus').prev().html();
        let content = $('.ajax_addblock-content-plus').prev().html();
        let parent = idglass;
        $.ajax({
            url: 'conf/list_add.php',
            type: 'POST',
            data: 'name=' + name + '&descript=' + descript + '&content=' + content + '&parent=' + parent,
            cache: false,
            success: function (jsondata) {
                $('.divright').hide();
                $('.addblock').hide();
                loadcontentplus();
            }
        });
    });

    $('.ajax_editblock-save-plus').click(function () {
        let id = $('.ajax_editblock-id-plus').val();
        let name = $('.ajax_editblock-name-plus').val();
        let descript = $('.ajax_editblock-descript-plus').prev().html();
        let content = $('.ajax_editblock-content-plus').prev().html();
        let parent = $('.ajax_editblock-parent-plus').val();
        $.ajax({
            url: 'conf/list_edit.php',
            type: 'POST',
            data: 'id=' + id + '&name=' + name + '&descript=' + descript + '&content=' + content + '&parent=' + parent,
            success: function (jsondata) {
                $('.divright').hide();
                $('.editblock').hide();
                loadcontentplus();
            }
        });
    });

    $('body').on('click', '.seeImage-delete', function () {
        let image = $('.editplus').attr('data-image');
        $.ajax({
            url: 'conf/list_delete.php',
            type: 'POST',
            data: 'img=' + image,
            cache: false,
            success: function (jsondata) {
                $('.seeImage-image').css('filter', 'grayscale(1)');
                $('.seeImage-image').fadeOut(500);
            }
        });
    });
});
}