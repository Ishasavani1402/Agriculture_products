var interleaveOffset = 0.5;
    var swiperOptions = {
        loop: true,
        direction: 'vertical',
        speed: 3000,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        autoplay: {
            delay: 3000,
        },
        fadeEffect: {
            crossFade: true
        }
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);