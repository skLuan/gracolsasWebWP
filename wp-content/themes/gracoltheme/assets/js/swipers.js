try {
  // ---------------------------- Interiores

  var swiper = new Swiper(".thumbSwiper", {
    spaceBetween: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    autoHeight: true,
  });
  const swiperSingleProject = new Swiper(".swiper-single-project", {
    // Optional parameters
    direction: "horizontal",
    autoplay: true,
    // If we need pagination
    pagination: {
      el: ".swiper-pagination-inmueble",
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next-inmueble",
      prevEl: ".swiper-button-prev-inmueble",
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
      autoplay: true,
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
    autoplay: true,
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
  // ---------------------------- avances

  const swiperAvance = new Swiper(".thumbSwiper-avance", {
    spaceBetween: 20,
    slidesPerView: 5,
    watchSlidesProgress: true,
    autoHeight: true,
  });

  const swiperSingleAvance = new Swiper(".swiper-single-project-avance", {
    // Optional parameters
    direction: "horizontal",
    autoHeight: true,
    autoplay: true,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination-avance",
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next-avance",
      prevEl: ".swiper-button-prev-avance",
    },
    thumbs: {
      swiper: swiperAvance,
    },
  });
} catch (error) {}

// ------------------------------- Cards in home
let swiperCards;
try {
  window;
  swiperCards = new Swiper(".swiperCard", {
    direction: "horizontal",
    spaceBetween: 20,
    slidesPerView: 1,
    autoplay: true,
    breakpoints: {
      // when window width is >= 640px
      640: {
        slidesPerView: 4,
      },
    },
  });
} catch (error) {
  console.log(error);
}
