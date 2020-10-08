$(document).ready(function() {
    const dropdown = $('.dropdown-mout');
    const dropdownMenu = $('.dropdown-menu-mout');

    $(dropdown).on('click', function(e) {
        e.stopPropagation();

        let menu = $(this).find('.dropdown-menu-mout');

        menu.addClass('active');
    });

    $(window).on('click', function() {
        $('.dropdown-menu-mout.active').removeClass('active');
    });
})
