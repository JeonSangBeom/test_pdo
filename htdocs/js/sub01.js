let infoSec1Slide;

$(document).ready(function () {

    // info__sec1 영역 슬라이드

    infoSec1Slide = new Swiper('.inf__s1_slide', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next.inf__s1_nav_next',
            prevEl: '.swiper-button-prev.inf__s1_nav_prev',
        },
        breakpoints: {
            769: {
                slidesPerView: 2,
                spaceBetween: 40,
                direction: "vertical",
            },
            541: {
                slidesPerView: 2,
                spaceBetween: 20,
                direction: "horizontal",
            },
        }
    });
   
    // 모바일 햄버거 영역이동

    $(".drop_f__depth2 li a").on("click", function(){
        $(".dropdown_full").removeClass("active");
        $(".header_ham_btn").removeClass("active");
        $(".drop_f__depth1 li p").removeClass("wow");
        $(".drop_f__depth2.init").removeClass("wow");
    });

});