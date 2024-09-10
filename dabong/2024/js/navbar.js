let lastScrollTop = 0;
const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", function () {
  const currentScroll =
    window.pageYOffset || document.documentElement.scrollTop;

  if (currentScroll > lastScrollTop) {
    // 스크롤을 내리면 네비바를 숨김
    navbar.style.top = "-200px"; // 네비바가 화면 위로 사라짐
  } else {
    // 스크롤을 올리면 네비바를 다시 보이게
    navbar.style.top = "0";
  }

  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // iOS와의 호환성 처리
});
