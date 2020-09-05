import $ from 'jquery';

if($('#reviews').length > 0)
{
    $(document).ready(function () {

        function loadcontent() {
            $('.loadcontent').html("");
            $.ajax({
                url: 'conf/reviews_load.php',
                type: 'POST',
                data: 'jsondata',
                cache: false,
                success: function (jsondata) {
                    $.each(jsondata, function (indx, element) {
                        $('.loadcontent').append('<div class="elname"><div class="elname_a">' + element.name + '</div><div class="delete" data-id="' + element.id + '"></div><div class="show" data-id="' + element.id + '" data-name="' + element.name + '" data-email="' + element.email + '" data-message="' + element.message + '" data-answer="' + element.answer + '" data-date="' + element.date + '" data-hide="' + element.hide + '"></div></div>');
                    });
                }
            });
        }

        loadcontent();

        $('.new').click(function () {
            $('.divright').fadeIn();
            $('.addblock').fadeIn();
            $('.viewblock').hide();
            $('.delblock').hide();
            $('.editblock').hide();
            $('.show-add-message').val('');
            $('.show-add-name').val('');
            $('.show-add-email').val('');
            $('.show-add-answer').val('');
            $('.show-add-date').val('');
        });

        $('.ajax_addblock-cancel, .ajax_editblock-cancel').click(function () {
            $('.divright').fadeOut();
        });

        $('body').on('click', '.delete', function () {
            $('.divright').fadeIn();
            $('.delblock').fadeIn();
            $('.viewblock').hide();
            $('.addblock').hide();
            let title = $(this).attr('data-id'); // this showed up as the text I was expecting
            $('.deleteblock-id').val(title);
        });

        $('.deleteblock-btn').click(function () {
            let id = $('.deleteblock-id').val();
            $.ajax({
                url: 'conf/reviews_delete.php',
                type: 'POST',
                data: 'id=' + id,
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.delblock').hide();
                    loadcontent();
                }
            });
        });

        let hide = '';
        let idAnswer = '';
        $('body').on('click', '.show', function () {
            $('.divright').fadeIn();
            $('.viewblock').fadeIn();
            $('.delblock').hide();
            $('.addblock').hide();
            let message = $(this).attr('data-message');
            let name = $(this).attr('data-name');
            let email = $(this).attr('data-email');
            let answer = $(this).attr('data-answer');
            let editAnswer = $(this).attr('data-answer');
            let date = $(this).attr('data-date');
            hide = $(this).attr('data-hide');
            $('.show-message').val(message);
            $('.show-name').val(name);
            $('.show-email').val(email);
            $('.show-answer').val(answer);
            $('.show-date').val(date);
            $('.show-hide').val(hide);
            $('.show-answer').append(editAnswer);
            if (hide == '1')
                $('.switch').find('input').prop('checked', true);
            else
                $('.switch').find('input').prop('checked', false);
            idAnswer = $(this).data('id');
        });

        $('body').on('click', '.switch', function () {
            if ($('.switch').find('input').prop('checked') == true)
                hide = 1;
            else
                hide = 0;
        });

        $('.ajax_editblock').on("submit", function (event) {
            event.preventDefault();
            let data = $(this).serialize();

            let id = idAnswer;
            $.ajax({
                url: 'conf/reviews_edit.php',
                type: 'POST',
                data: data + '&id=' + id + '&hide=' + hide,
                cache: false,
                success: function (jsondata) {
                    $('.divright').hide();
                    $('.viewblock').hide();
                    loadcontent();
                }
            });
        });

        $('.ajax_addblock').on("submit", function (event) {
            event.preventDefault();
            let data = $(this).serialize();

            let name = $('.show-add-name').val();
            let email = $('.show-add-email').val();
            let message = $('.show-add-message').val();
            let date = $('.show-add-date').val();
            let answer = $('.show-add-answer').val();
            if (name.length <= 0) $('.show-add-name').css({
                'border': '1px solid #ff1302',
                'box-shadow': '0 0 6px 1px #ff1302'
            });
            else $('.show-add-name').css({'border': '1px solid #00ff00', 'box-shadow': '0 0 6px 1px #00ff00'});
            if (email.length <= 0) $('.show-add-email').css({
                'border': '1px solid #ff1302',
                'box-shadow': '0 0 6px 1px #ff1302'
            });
            else $('.show-add-email').css({'border': '1px solid #00ff00', 'box-shadow': '0 0 6px 1px #00ff00'});
            if (message.length <= 0) $('.show-add-message').css({
                'border': '1px solid #ff1302',
                'box-shadow': '0 0 6px 1px #ff1302'
            });
            else $('.show-add-message').css({'border': '1px solid #00ff00', 'box-shadow': '0 0 6px 1px #00ff00'});
            if (date.length <= 0)
                $('.show-add-date').css({'border': '1px solid #ff1302', 'box-shadow': '0 0 6px 1px #ff1302'});
            else {
                $('.show-add-date').css({'border': '1px solid #00ff00', 'box-shadow': '0 0 6px 1px #00ff00'});
                $.ajax({
                    url: 'conf/reviews_add.php',
                    type: 'POST',
                    data: 'name=' + name + '&email=' + email + '&message=' + message + '&answer=' + answer + '&date=' + date + '&hide=' + hide,
                    cache: false,
                    success: function (jsondata) {
                        $('.divright').hide();
                        $('.addblock').hide();
                        loadcontent();
                    }
                });
            }
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
                    loadcontent();
                },
            });
        });

        $('.bigdownloadbutton').on('click', function(){
            $('.seeImage-image, .delete-image').fadeIn(2000);
            $('.seeImage-image').css('filter', 'none');
        });
    });
}