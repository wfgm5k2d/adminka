$(document).ready(function () {
    let screen = $('.displays-display'),
        nav = $('.displays-navigation-nav'),
        activeNav = 'displays-navigation-nav-active',
        pixels = 0;

    screen.click(function(){
        screen.removeClass('displays-display-active');
        $(this).addClass('displays-display-active');

        if($(this).hasClass('displays-display--desctop'))
            $('.frame').css('width' , '100%');

        if($(this).hasClass('displays-display--laptop'))
            $('.frame').css('width' , '767');

        if($(this).hasClass('displays-display--mobile'))
            $('.frame').css('width' , '479');
    });

    nav.click(function(){

        if($(this).hasClass('display-navigation__down'))
            $(this).addClass(activeNav);

        if($(this).hasClass('display-navigation__lock'))
            $(this).addClass(activeNav);

        if($(this).hasClass('display-navigation__close')) {
            $(this).addClass(activeNav);
            nav.removeClass(activeNav);
        }
    });

    $('.display-navigation__close').click(function () {
        $('.frame').hide('slide', {direction: 'right'}, 1000);
    });

    $('.display-navigation__down').click(function () {
        if(pixels == 0)
        {
            $('.frame').animate({
                height: "30",
            }, 1000, function() {
                // Animation complete.
            });
            pixels = 1;
        }
        else
        {
            $('.frame').animate({
                height: "455",
            }, 1000, function() {
                // Animation complete.
            });
            pixels = 0;
        }
    });
});