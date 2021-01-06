$(document).ready(function () {
    const nav = $('.mout-pub-panel');

    nav.click(function () {
        var burger = $(this).find('.burger');

        burger.addClass('active');
        // $('.main-nav').toggleClass('active').toggleClass('scale-up-tl');

        setTimeout(function () {
            console.log('ok ??');
            // $('.mout-pub-panel').addClass('hidden');

            $('.main-nav').addClass('active').addClass('scale-up-tl');

            $('.close').on('click', function() {
                burger.removeClass('active');
                $('.main-nav').removeClass('active').removeClass('scale-up-tl');
            });

        }, 500);

    });

    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        if (scroll > 100) {
            $('span.txt-hidden').addClass('show');
            $('.mout-pub-panel#left-panel').addClass('fixed');
        } else {
            $('span.txt-hidden').removeClass('show');
            $('.mout-pub-panel.fixed#left-panel').removeClass('fixed');
        }
    })


});
