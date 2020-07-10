$(document).ready(function () {
    let activeNav = 'displays-navigation-nav-active',
        nav = $('.displays-navigation-nav'),
        load = $('.windowLoad'),
        preview = $('.screen'),
        pixels = 0,
        mobileScreen = '',
        laptopScreen = '',
        desctopScreen = '';

    function windowLoad() {
        load.html("");

        $.ajax({
            url: 'conf/window_load.php',
            type: 'POST',
            data: 'jsondata',
            returnType: 'json',
            cache: false,
            success: function (jsondata) {
                $.each(jsondata, function (indx, element) {

                    if(element.screen == '479px') {
                        element.screen = ';width: 479px';
                        mobileScreen = 'displays-display-active';
                    }

                    if(element.screen == '767px') {
                        element.screen = ';width: 767px';
                        laptopScreen = 'displays-display-active';
                    }

                    if(element.screen == '100%') {
                        element.screen = ';width: 100%';
                        desctopScreen = 'displays-display-active';
                    }

                    if (element.status == 'Y') {
                        load.append('' +
                            '<div class="screen" style="display: none"><i class="icofont-monitor"></i></div>\n' +
                            '<div class="frame" style="display: block'+element.screen+'" >\n' +
                            '    <div class="displays-navigation">\n' +
                            '        <div class="displays-navigation-nav display-navigation__down"><i class="icofont-thin-down"></i></div>\n' +
                            '        <div class="displays-navigation-nav displays-navigation-nav-active display-navigation__lock"><i class="icofont-lock"></i></div>\n' +
                            '        <div class="displays-navigation-nav display-navigation__close"><i class="icofont-close-line"></i></div>\n' +
                            '    </div>\n' +
                            '    <div class="displays">\n' +
                            '        <div class="displays-display displays-display--desctop '+desctopScreen+'"><i class="icofont-monitor"></i></div>\n' +
                            '        <div class="displays-display displays-display--laptop '+laptopScreen+'"><i class="icofont-laptop"></i></div>\n' +
                            '        <div class="displays-display displays-display--mobile '+mobileScreen+'"><i class="icofont-ui-touch-phone"></i></div>\n' +
                            '    </div>\n' +
                            '    <iframe class="frame-iframe" id="frame-iframe" src="https://"></iframe>\n' +
                            '</div>');
                    } else {
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
                            '    <iframe class="frame-iframe" id="frame-iframe" src="https://"></iframe>\n' +
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

    $('body').on('click', '.screen', function () {
        $(this).hide('slide', {direction: 'right'}, 300);
        $('.frame').show('slide', {direction: 'right'}, 1000);
    });

    $('body').on('click', '.displays-display', function () {
        $('.displays-display').removeClass('displays-display-active');
        $(this).addClass('displays-display-active');

        if ($(this).hasClass('displays-display--desctop')) {
            $('.frame').css('width', '100%');

            $.ajax({
                url: 'conf/window_load.php',
                type: 'POST',
                data: 'desctop=100%',
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    console.log('100%');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        if ($(this).hasClass('displays-display--laptop')) {
            $('.frame').css('width', '767');

            $.ajax({
                url: 'conf/window_load.php',
                type: 'POST',
                data: 'laptop=767px',
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    console.log('767px');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        if ($(this).hasClass('displays-display--mobile')) {
            $('.frame').css('width', '479');

            $.ajax({
                url: 'conf/window_load.php',
                type: 'POST',
                data: 'mobile=479px',
                returnType: 'json',
                cache: false,
                success: function (jsondata) {
                    console.log('479px');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

    $('body').on('click', '.displays-navigation-nav', function () {

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

    $('body').on('click', '.display-navigation__close', function () {
        nav.removeClass(activeNav);
        $('.frame').hide('slide', {direction: 'right'}, 1000);
        preview.show('slide', {direction: 'right'}, 1000);
    });

    $('body').on('click', '.display-navigation__down', function () {
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

    window.setInterval(function() {
        reloadIFrame()
    }, 3000);

    function reloadIFrame() {
        console.log('reloading..');
        document.getElementById('frame-iframe').contentWindow.location.reload();
    }
});