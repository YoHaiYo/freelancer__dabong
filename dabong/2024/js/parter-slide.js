const partnerSwiper = new Swiper("#partnerSwiper.swiper", {
  // 자동롤링 2초마다
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  // 센터모드
  centeredSlides: true,
  // 루프반복
  loop: true,
  // 슬라이드 개수
  slidesPerView: 5,

  pagination: {
    el: "#partners-section .swiper-pagination",
  },
});
