// Custom Scripts for Primal Template //

(function($) {
    "use strict";

    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
    var win = $(window);
    /* Navbar Menu */

    win.on("scroll", function () {
        var bodyScroll = win.scrollTop();

        if ( bodyScroll > 100 ) {
            $("body").addClass("scroll-start");
        } else {
            $("body").removeClass("scroll-start");
        }
    });

    var topbarh = $('.header-topbar-template-custom').outerHeight();
    var adminbarh = $('#wpadminbar').outerHeight();

    if ( $('.header-topbar-template-custom').length && $(".navbar-fixed-top").length ) {
        var totalh = ( typeof adminbarh ) == 'undefined' ? topbarh : adminbarh + topbarh;
        $(".navbar-fixed-top").css("top", totalh+'px' );
    }

    win.on("resize", function () {
        var topbarh = $('.header-topbar-template-custom').outerHeight();
        var adminbarh = $('#wpadminbar').outerHeight();
        if ( $('.header-topbar-template-custom').length && $(".navbar-fixed-top").length ) {
            var totalh = ( typeof adminbarh ) == 'undefined' ? topbarh : adminbarh + topbarh;
            $(".navbar-fixed-top").css("top", totalh+'px' );
        }
    });

    var divPosid = $('#main');
    if (!divPosid.length) {
        return;
    }
    var mainbottom = divPosid.offset().top;
    // on scroll,
    $(window).on('scroll',function(){
        // we round here to reduce a little workload
        stop = Math.round($(window).scrollTop());
        if (stop > mainbottom) {
            $('.navbar').addClass('past-main');
            $('.navbar').addClass('effect-main')
        } else {
            $('.navbar').removeClass('past-main');
        }
    });

    // Collapse navbar on click
    $(document).on('click.nav','.navbar-collapse.in',function(e) {
        if( $(e.target).is('a') ) {
            $(this).removeClass('in').addClass('collapse');
        }
    });

    if(jQuery('#main .hero-section.signup').length != 0){
        jQuery(".navbar-nav").addClass('nav-white');
    }
    if(jQuery('#main').find('div.image-bg').length != 0){
        jQuery(".navbar-nav").addClass('nav-white');
    }

    if(jQuery('#main').find('.split-home').length != 0){
        jQuery("#main").addClass('cs-main');
        var screenh = jQuery(window).height();
        jQuery(".split-home").css('height', screenh);
    }

    /*-----------------------------------
    ----------- Scroll To Top -----------
    ------------------------------------*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 1000) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-top').on('click', function () {
        $('#back-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 1500);
        return false;
    });

    /* ------ jQuery for Easing min -- */
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    /* --------- Wow Init ------ */
    new WOW().init();

    /* ----- Counter Up ----- */
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    /* ----- Countdown ----- */
    if($.find('#countdown')[0]) {
        $('#countdown').countDown({
            targetDate: {
                'day': 14,
                'month': 7,
                'year': 2017,
                'hour': 11,
                'min': 13,
                'sec': 0
            },
            omitWeeks: true
        });
        //enter the count down date using the format year, month, day, time: hour, min, sec
        if( $('.day_field .top').html() == "0" ) $('.day_field').css('display','none');
    }

    /*----- Preloader ----- */
    $(window).on('load',function() {
        setTimeout(function() {
            $('#loading').fadeOut('slow', function() {
            });
        }, 3000);
        // :: 14.0 Preloader active code
        $('body').css('overflow-y', 'visible');
        $('#preloader-default').fadeOut('slow', function () {
            $(this).remove();
        });
        $('.preloader-container').fadeOut('slow', function(){
            $(this).remove();
        });
    });

})(jQuery);
