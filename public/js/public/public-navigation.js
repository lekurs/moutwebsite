$(document).ready(function () {
    const nav = $('.mout-pub-panel');

    nav.click(function () {
        burger = $(this).find('.burger');

        burger.toggleClass('active');

        // burger = $(this).find('nav.mout-burger-nav').toggleClass('nav-active');
        //
        // let lineTop = burger.find('span.line-top');
        // let lineMid = burger.find('span.line-mid');
        // let lineBot = burger.find('span.line-bot');
        //
        // lineTop.delay(700).queue(function () {
        //     $(this).toggleClass('active');
        // });
        //
        // lineMid.delay(1000).queue(function () {
        //     $(this).toggleClass('disactivated');
        // });
        //
        // lineBot.delay(700).queue(function () {
        //     $(this).toggleClass('active');
        // });
    });
});
