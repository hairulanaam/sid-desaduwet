let swiperPerangkatDesa;
let swiperKegiatanDesa;

if (!swiperPerangkatDesa) {
  swiperPerangkatDesa = new Swiper("#perangkatDesa", {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    spaceBetween: 10,
    slidesPerView: 4,
    breakpoints: {
      320: { slidesPerView: 1, spaceBetween: 10 },
      480: { slidesPerView: 2, spaceBetween: 10 },
      640: { slidesPerView: 2, spaceBetween: 10 },
      768: { slidesPerView: 3, spaceBetween: 15 },
      1024: { slidesPerView: 4, spaceBetween: 15 },
    },
  });
}

if (!swiperKegiatanDesa) {
  swiperKegiatanDesa = new Swiper("#kegiatanDesa", {
    grabCursor: true,
    initialSlide: 4,
    loop: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 10,
    speed: 1000,
    freeMode: false,
    mouseWheel: {
      thresholdDelta: 30,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}