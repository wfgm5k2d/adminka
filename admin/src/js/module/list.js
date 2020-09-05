import $ from 'jquery';

if($('#list').length > 0)
{
    $(document).ready(function () {
        let getParams = (new URL(document.location)).searchParams;
        let GET_VALUE = getParams.get("id");
        $(".ajax_addblock-parent").val(GET_VALUE);

        /**
         * CKEDITOR
         */
        const description = CKEDITOR.replace( 'descript', {
            language: 'ru',
        });
        const content = CKEDITOR.replace( 'content', {
            language: 'ru',
        });

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

        $('body').on('click', '.new', function () {
            $('.divright').fadeIn();
            $('.addblock').fadeIn();
            $('.delblock').hide();
            $('.editblock').hide();
            $('.editblockplus').hide();
            $('.ajax_addblock-name, .ajax_addblock-name-plus').val('');
        });

        $('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function () {
            $('.divright').fadeOut();
            description.setData('');
            content.setData('');
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

        $('body').on('click', '.edit', function () {
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
            description.setData(editDescription);
            content.setData(editContent);
            if(editImage == 'null')
            {
                $('.delete-image').hide();
            }
            else
            {
                $('.seeImage-image').css('background', 'url("/upload/'+editImage+'")');
            }
            $('.form-edit-img').val(titleId);
        });

        let titleId = null;
        $('body').on('click', '.editplus', function () {
            $('.divright').fadeIn();
            $('.editblockplus').fadeIn();
            $('.editblock').hide();
            $('.delblock').hide();
            $('.addblock').hide();
            $('.addblockplus').hide();
            titleId = $(this).attr('data-id');
            let titleName = $(this).attr('data-name');
            let editDescription = $(this).attr('data-descript');
            let editContent = $(this).attr('data-content');
            let editImage = $(this).data('image');
            description.setData(editDescription);
            content.setData(editContent);
            $('.ajax_editblock-id-plus').val(titleId);
            $('.ajax_editblock-name-plus').val(titleName);
            if(editImage == 'null')
            {
                $('.delete-image').hide();
            }
            else
            {
                $('.seeImage-image').css('background', 'url("/upload/'+editImage+'")');
            }
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

            let sDescriptionText = description.getData();
            let sContentText = content.getData();

            $.ajax({
                url: 'conf/list_edit.php',
                type: 'POST',
                data: data+'&descriptionText=' + sDescriptionText + '&contentText=' + sContentText,
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

        /**
         * Создаем превью картинки
         */

        var maxFileSize = 2 * 1024 * 1024; // (байт) Максимальный размер файла (2мб)
        var queue = {};
        var form = $('form#uploadImages');
        var imagesList = $('#uploadImagesList');

        var itemPreviewTemplate = imagesList.find('.item.template').clone();
        itemPreviewTemplate.removeClass('template');
        imagesList.find('.item.template').remove();


        $('#addImages').on('change', function () {
            var files = this.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if ( !file.type.match(/image\/(jpeg|jpg|png|gif)/) ) {
                    alert( 'Фотография должна быть в формате jpg, png или gif' );
                    continue;
                }

                if ( file.size > maxFileSize ) {
                    alert( 'Размер фотографии не должен превышать 2 Мб' );
                    continue;
                }

                preview(files[i]);
            }

            this.value = '';
        });

        // Создание превью
        function preview(file) {
            var reader = new FileReader();
            reader.addEventListener('load', function(event) {
                var img = document.createElement('img');

                var itemPreview = itemPreviewTemplate.clone();

                itemPreview.find('.img-wrap img').attr('src', event.target.result);
                itemPreview.data('id', file.name);

                imagesList.append(itemPreview);

                queue[file.name] = file;

            });
            reader.readAsDataURL(file);
        }

        // Удаление фотографий
        imagesList.on('click', '.delete-link', function () {
            var item = $(this).closest('.item'),
                id = item.data('id');

            delete queue[id];

            item.remove();
        });


        // Отправка формы
        form.on('submit', function(event) {
            let formData = new FormData(this);
            for (let id in queue) {
                formData.append('images[]', queue[id]);
            }

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                async: true,
                success: function (res) {
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });

        $('.delete-image').on('click', function(){
            const id = $('.editplus').data('id');
            $.ajax({
                url: 'conf/loaderImage.php',
                type: 'POST',
                data: 'delete=Y&id=' + id,
                success: function (res) {
                    $('.seeImage-image').css('filter', 'grayscale(1)');
                    $('.seeImage-image, .delete-image').fadeOut(500);
                    loadcontentplus();
                },
            });
        });

        $('.bigdownloadbutton').on('click', function(){
            $('.seeImage-image, .delete-image').fadeIn(2000);
            $('.seeImage-image').css('filter', 'none');
        });
    });
}