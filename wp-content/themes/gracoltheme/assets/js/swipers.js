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
} catch (error) {}
