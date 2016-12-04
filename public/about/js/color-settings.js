(function ($) {
    "use strict";

    $('.color-trigger').on('click', function () {
        $(this).parent().toggleClass('visible-palate');
    });


    $('.default-color').on('click', function () {
        $('body').removeClass('allgreen allred allblue allyellow');
        $('.default-color').addClass('active')
        $('.green-color').removeClass('active');
        $('.red-color').removeClass('active');
        $('.blue-color').removeClass('active');
        $('.yellow-color').removeClass('active');
    });

    $('.yellow-color').on('click', function () {
        $('body').addClass('allyellow').removeClass('allgreen allred allblue');
        $('.yellow-color').addClass('active')
        $('.default-color').removeClass('active');
        $('.green-color').removeClass('active');
        $('.red-color').removeClass('active');
        $('.blue-color').removeClass('active');
    });

    $('.green-color').on('click', function () {
        $('body').addClass('allgreen').removeClass('allred allblue allyellow');
        $('.green-color').addClass('active')
        $('.default-color').removeClass('active');
        $('.yellow-color').removeClass('active');
        $('.red-color').removeClass('active');
        $('.blue-color').removeClass('active');
    });


    $('.red-color').on('click', function () {
        $('body').addClass('allred').removeClass('allgreen allblue allyellow');
        $('.red-color').addClass('active')
        $('.default-color').removeClass('active');
        $('.green-color').removeClass('active');
        $('.yellow-color').removeClass('active');
        $('.blue-color').removeClass('active');
    });


    $('.blue-color').on('click', function () {
        $('body').addClass('allblue').removeClass('allgreen allred allyellow');
        $('.blue-color').addClass('active')
        $('.default-color').removeClass('active');
        $('.green-color').removeClass('active');
        $('.red-color').removeClass('active');
        $('.yellow-color').removeClass('active');
    });


    $('.deepblue-color').on('click', function () {
        $('body').addClass('secondary-two');
        $('.deepblue-color').addClass('actives');
        $('.black-color').removeClass('actives');
    });

    $('.black-color').on('click', function () {
        $('body').removeClass('secondary-two');
        $('.black-color').addClass('actives');
        $('.deepblue-color').removeClass('actives');
    });



}(jQuery));