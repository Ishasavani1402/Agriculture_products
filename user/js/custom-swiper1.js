var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 20,
      loop:true,
      speed: 4000,
      navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        autoplay: {
            delay: 3000,
        },
        fadeEffect: {
            crossFade: true
        },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      }

    });