try {
  var swiper = new Swiper(".thumbSwiper", {
    spaceBetween: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    autoHeight: true,
  });
  const swiperSingleProject = new Swiper(".swiper-single-project", {
    // Optional parameters
    direction: "horizontal",
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

  // ---------------------------- Exteriores

  const swiperExteriores = new Swiper(".thumbSwiperExteriores", {
    spaceBetween: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    autoHeight: true,
  });
  const swiperSingleExteriores = new Swiper(
    ".swiper-single-project-exteriores",
    {
      // Optional parameters
      direction: "horizontal",
      // If we need pagination
      pagination: {
        el: ".swiper-pagination-ext",
      },
      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next-ext",
        prevEl: ".swiper-button-prev-ext",
      },
      thumbs: {
        swiper: swiperExteriores,
      },
    }
  );

  // ---------------------------- Planos

  const swiperPlanos = new Swiper(".thumbSwiper-planos", {
    spaceBetween: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    autoHeight: true,
  });
  const swiperSinglePlanos = new Swiper(".swiper-single-project-planos", {
    // Optional parameters
    direction: "horizontal",
    // If we need pagination
    pagination: {
      el: ".swiper-pagination-planos",
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next-planos",
      prevEl: ".swiper-button-prev-planos",
    },
    thumbs: {
      swiper: swiperPlanos,
    },
  });
} catch (error) {}
