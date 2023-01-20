$(document).ready(function () {

    new WOW().init();

    function resizeOpt() {
        if ($(window).innerWidth() <= 540) {
            $(".sub_title_wrap.fran h1").addClass("this");
            $(".sub_title_wrap.fran .sub_title_btn_wrap").addClass("active");
        } else {
            $(".sub_title_wrap.fran h1").removeClass("this");
            $(".sub_title_wrap.fran .sub_title_btn_wrap").removeClass("active");
        }
    }
    resizeOpt();

    $(window).resize(function () {
        resizeOpt()
    })

    // 모바일 햄버거 영역이동

    $(".drop_f__depth2 li a").on("click", function () {
        $(".dropdown_full").removeClass("active");
        $(".header_ham_btn").removeClass("active");
        $(".drop_f__depth1 li p").removeClass("wow");
        $(".drop_f__depth2.init").removeClass("wow");
    });

});