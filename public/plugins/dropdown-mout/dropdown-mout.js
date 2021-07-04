$(document).ready(function() {
    const dropdown = $('.dropdown-mout');
    const dropdownMenu = $('.dropdown-menu-mout');
    const dropdownMenuTable = $('.dropdown-mout-table');

    $(dropdown).on('click', function(e) {
        e.stopPropagation();

        let menu = $(this).find('.dropdown-menu-mout');

        menu.addClass('active');
    });

    $(dropdownMenuTable).on('click', function(e) {
        e.stopPropagation();

        let menu = $(this).find('.dropdown-menu-mout');

        menu.addClass('active');
    })

    $(window).on('click', function() {
        $('.dropdown-menu-mout.active').removeClass('active');
        $('.dropdown-menu-mout.dropdown-menu-mout-table.active').removeClass('active');
    });
})
