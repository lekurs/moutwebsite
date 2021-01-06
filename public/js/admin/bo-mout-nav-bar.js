$(document).ready(function ($) {
    const dropdown = $('.btn-group.dropdown-nav');
    const tabPanel = $('.mout-pan-top');
    const slideParent = $('li.nav-parent');
    const addNav =  $('.btn.mout-add-buttton');
    const cancel = $('.btn.mout-btn-add-button.btn-cancel')
    const pageWrapper = $('.page-wrapper');
    const dropdownTopAdminNav = $('.mout-top-dropdown-menu');

    //Tab panel top
    $(tabPanel).click(function (e) {
        e.preventDefault();
        let target = $(this).attr('data-target');

        if ((tabPanel).hasClass('active')) {
            tabPanel.removeClass('active');
        }

        $(this).addClass('active');

        let pan = $(this).closest('.mout-left-panel-informations').find('.mout-tab-pane#'+target);

        $(this).closest('.mout-left-panel-informations').find('.mout-tab-pane').removeClass('active');

        pan.addClass('active');
    });

    //Dropdown left menu
    dropdown.click(function (e) {
        e.preventDefault();
        let list = $(this).find('ul');
        $(this).find('ul').toggleClass('open');

    });

    //slide left menu
    slideParent.click(function (e) {
        // e.preventDefault();

        let navSlide = $(this).find('.nav-children');

        // navSlide.toggleClass('slide');

        navSlide.slideToggle('fast');
    })

    //Show Creation Menu
    $(addNav).click(function (e) {
        $(this).closest('.mout-content-panel').find('.mout-create-navigation-content').addClass('showNav');
    });

    $(cancel).click(function () {
        $(this).closest('.mout-content-panel').find('.mout-create-navigation-content').removeClass('showNav');
    })

    let heightWrapper = $(window).height();
    $(pageWrapper).css('height', heightWrapper);

    //Admin nav top
    dropdownTopAdminNav.on('click', function (e) {
        e.preventDefault();
       $('.dropdown-menu.main-drop').toggle();
    });

});
