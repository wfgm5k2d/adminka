$(document).ready(function () {
    let screen = $('.displays-display'),
        nav = $('.displays-navigation-nav'),
        activeNav = 'displays-navigation-nav-active',
        preview = $('.screen'),
        load = $('.windowLoad'),
        pixels = 0;

    function windowLoad() {
        load.html("");

        $.ajax({
            url: 'conf/window_load.php',
            type: 'POST',
            data: 'jsondata',
            returnType: 'json',
            cache: false,
            success: function (jsondata) {
                $.each(jsondata, function (element) {
                    if (element.status == 'Y') {
                        load.append('kek');
                        load.append('' +
                            '<div class="screen"><i class="icofont-monitor"></i></div>\n' +
                            '<div class="frame" style="display: none">\n' +
                            '    <div class="displays-navigation">\n' +
                            '        <div class="displays-navigation-nav display-navigation__down"><i class="icofont-thin-down"></i></div>\n' +
                            '        <div class="displays-navigation-nav"><i class="icofont-lock"></i></div>\n' +
                            '        <div class="displays-navigation-nav display-navigation__close"><i class="icofont-close-line"></i></div>\n' +
                            '    </div>\n' +
                            '    <div class="displays">\n' +
                            '        <div class="displays-display displays-display--desctop"><i class="icofont-monitor"></i></div>\n' +
                            '        <div class="displays-display displays-display--laptop"><i class="icofont-laptop"></i></div>\n' +
                            '        <div class="displays-display displays-display--mobile displays-display-active"><i class="icofont-ui-touch-phone"></i></div>\n' +
                            '    </div>\n' +
                            '    <iframe class="frame-iframe" src="https://artcomunity.ru"></iframe>\n' +
                            '</div>');
                    } else {
                        load.append('' +
                            '<div class="screen" style="display: none"><i class="icofont-monitor"></i></div>\n' +
                            '<div class="frame">\n' +
                            '    <div class="displays-navigation">\n' +
                            '        <div class="displays-navigation-nav display-navigation__down"><i class="icofont-thin-down"></i></div>\n' +
                            '        <div class="displays-navigation-nav"><i class="icofont-lock"></i></div>\n' +
                            '        <div class="displays-navigation-nav display-navigation__close"><i class="icofont-close-line"></i></div>\n' +
                            '    </div>\n' +
                            '    <div class="displays">\n' +
                            '        <div class="displays-display displays-display--desctop"><i class="icofont-monitor"></i></div>\n' +
                            '        <div class="displays-display displays-display--laptop"><i class="icofont-laptop"></i></div>\n' +
                            '        <div class="displays-display displays-display--mobile displays-display-active"><i class="icofont-ui-touch-phone"></i></div>\n' +
                            '    </div>\n' +
                            '    <iframe class="frame-iframe" src="https://artcomunity.ru"></iframe>\n' +
                            '</div>');
                     }
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    windowLoad();

    preview.click(function () {
        $(this).hide('slide', {direction: 'right'}, 300);
        $('.frame').show('slide', {direction: 'right'}, 1000);
    });

    screen.click(function () {
        screen.removeClass('displays-display-active');
        $(this).addClass('displays-display-active');

        if ($(this).hasClass('displays-display--desctop'))
            $('.frame').css('width', '100%');

        if ($(this).hasClass('displays-display--laptop'))
            $('.frame').css('width', '767');

        if ($(this).hasClass('displays-display--mobile'))
            $('.frame').css('width', '479');
    });

    nav.click(function () {

        if ($(this).hasClass('display-navigation__down'))
            $(this).addClass(activeNav);

        if ($(this).hasClass('display-navigation__close')) {
            $(this).addClass(activeNav);
            nav.removeClass(activeNav);
        }

        if ($(this).hasClass('display-navigation__lock')) {
            $(this).removeClass(activeNav);
            $(this).removeClass('display-navigation__lock');

            $.ajax({
                url: 'conf/window.php',
                type: 'POST',
                data: 'status=N',
                cache: false,
                success: function (jsondata) {
                    console.log('N');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } else {
            $(this).addClass(activeNav);
            $(this).addClass('display-navigation__lock');

            $.ajax({
                url: 'conf/window.php',
                type: 'POST',
                data: 'status=Y',
                cache: false,
                success: function (jsondata) {
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

    $('.display-navigation__close').click(function () {
        nav.removeClass(activeNav);
        $('.frame').hide('slide', {direction: 'right'}, 1000);
        preview.show('slide', {direction: 'right'}, 1000);
    });

    $('.display-navigation__down').click(function () {
        if (pixels == 0) {
            $('.frame').animate({
                height: "30",
            }, 1000, function () {
                // Animation complete.
            });

            pixels = 1;
        } else {
            $('.frame').animate({
                height: "455",
            }, 1000, function () {
                // Animation complete.
            });
            pixels = 0;
        }
    });
});