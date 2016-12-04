(function ($) {
    "use strict";

        //Activated Testimonial Carousel
        
        $('.testimonial-active').owlCarousel({
            items: 3,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            smartSpeed: 500,
            autoplaySpeed: 3000,
            loop: true,
            responsive: {
                992: {
                    item: 3
                },
                768: {
                    items: 2
                },
                320: {
                    items: 1
                }
            }
        });

        //Activated Clients Logo Carousel
        
        $('.clients-active').owlCarousel({
            items: 7,
            margin: 95,
            autoplay: true,
            smartSpeed: 500,
            autoplaySpeed: 3000,
            loop: true,
            responsive: {
                992: {
                    item: 6
                },
                768: {
                    items: 5
                },
                320: {
                    items: 3,
                    margin: 50
                }
            }
        });

        //Activated Gallery Photos Carousel
        
        $('.gallery-wrap').owlCarousel({
            items: 1,
            autoplay: true,
            smartSpeed: 500,
            autoplaySpeed: 3000,
            loop: true
        });

        //Activated Testimonial Widget Carousel
        
        $('.widget-testimonial').owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn'
        });

        //Activated Main Slider
        
        $(".Modern-Slider").slick({
            autoplay: true,
            autoplaySpeed: 10000,
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            dots: true,
            pauseOnDotsHover: true,
            cssEase: 'linear',
            fade: true,
            //   draggable: true,
            prevArrow: '<button class="PrevArrow"></button>',
            nextArrow: '<button class="NextArrow"></button>',
        });

        //Accordion JS
        
        var dd = $('dd');
        dd.filter(':nth-child(n+4)').hide();
        $('dl.accordion').on('click', 'dt', function () {
            $(this)
                .toggleClass('active')
                .siblings('dt')
                .removeClass('active');

            $(this)
                .next()
                .slideToggle(200)
                .siblings('dd')
                .slideUp(300);

        });

        //Activated jQuery LightBox PrettyPhoto
        
        $('.light-box').prettyPhoto();

        //Activated jQuery CounterUp
        
        $('.counter').counterUp({
            delay: 10,
            time: 5000
        });

        //MobileMenu Activated
        
        $('.mainmenu-area nav').meanmenu();


        // preloader
        
        $(window).on('load', function () {
            $('body').css('overflow-y', 'visible');
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });
        

}(jQuery));