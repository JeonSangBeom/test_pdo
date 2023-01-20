let heroSlide,
    idxSec2SlideWidth,
    idxSec3Back1,
    pageArr,
    pageArrLength,
    skewed = 0,
    delta = 0;

$(document).ready(function () {

    if ($(window).innerWidth() < 1025) {
        $(".sec_hero").css("height", window.innerHeight + "px")
    }

    // main footer

    $("footer").addClass("section fp-auto-height");

    // main fullpage

    pageArr = $(".page_section").get();
    pageArrLength = pageArr.length;
    for (i = 0; i < pageArrLength; i++) {
        $(".idx_p__bar").css("height", 25 * (i + 1))
        if ($(window).innerWidth() < 1025) {
            $(".idx_p__bar").css("height", 20 * (i + 1))
        }
        if ($(window).innerWidth() < 540) {
            $(".idx_p__bar").css("height", 15 * (i + 1))
        }
    }

    $('#fullpage').fullpage({
        autoScrolling: true,
        scrollHorizontally: true,
        anchors: ['01', '02', '03', '04', '05', '06'],
        normalScrollElements: '.modal',
        afterLoad: function (origin, direction) {

            let activeIdxNum = $(".page_section.active").index(),
                spPage = ['02', '03', '06'];

            // fp header

            if (origin !== '01') {
                $("header").addClass("scrolled");
                $("header").removeClass("init");
            } else {
                $("header").removeClass("scrolled");
                $("header").addClass("init");
            }

            // fp nav

            $(".current_page").text(origin);
            $(".max_page").text("0" + pageArrLength);
            if (activeIdxNum == -1) {
                activeIdxNum = 6;
                $(".idx_progress_wrap").css("opacity", "0");
            }else{
                $(".idx_progress_wrap").css("opacity", "1");
            }
            $(".idx_p__bar li").css("height", 25 * (activeIdxNum + 1));
            if ($(window).innerWidth() < 1025) {
                $(".idx_p__bar li").css("height", 20 * (activeIdxNum + 1));
            }
            if ($(window).innerWidth() < 540) {
                $(".idx_p__bar li").css("height", 15 * (activeIdxNum + 1));
            }

            if (activeIdxNum > 0) {
                $("#goMainTopBTn").stop().fadeIn(300);
            } else {
                $("#goMainTopBTn").hide();
            }


            if (spPage.includes(origin) == true) {
                $(".idx_progress_wrap").addClass("scrolled");
                $("#goMainTopBTn").addClass("scrolled");
            } else {
                $(".idx_progress_wrap").removeClass("scrolled");
                $("#goMainTopBTn").removeClass("scrolled");
            }

            // sec5 ef
            if (direction == 5) {
                $(".s5__con").addClass("active")
            } else {
                $(".s5__con").removeClass("active")
            }

        },
    });

    // hero 영역 슬라이드

    heroSlide = new Swiper('.hero', {
        slidesPerView: 1,
        loop: true,
        pagination: {
            el: '.h__pager',
            type: 'bullets'
        },
        navigation: {
            nextEl: '.swiper-button-next.h__nav_next',
            prevEl: '.swiper-button-prev.h__nav_prev',
        },
    });

    // sec2 영역 탭 메뉴

    $(".s2__tab_menu li").on("click", function () {
        let menuNum = $(this).data("menu");

        $(".s2__tab_menu li").removeClass("active");
        $(this).addClass("active");

        $(".s2__title h1").stop().fadeOut(0);
        $(".s2__title h1[data-menu='" + menuNum + "']").stop().fadeIn(200).css("display", "flex");

        $(".s2__slide_container").stop().fadeOut(0);
        $(".s2__slide_container[data-menu='" + menuNum + "']").stop().fadeIn(200);

        $(".s2__link_btn_wrap").stop().fadeOut(0);
        $(".s2__link_btn_wrap[data-menu='" + menuNum + "']").stop().fadeIn(200).css("display", "flex");

    });

    // sec3 배경 효과

    if($("sec4").hasClass("skewed") == true){
        skewed = 1000;
    }

    $(".sec4").on("mousemove", function(e){

        delta = (e.clientX - $(this).innerWidth() / 32) * 1.4;

        $(".sec4_back_wrap.wrap1").css({

            width : e.clientX + skewed + delta + "px",

        });

    })

});