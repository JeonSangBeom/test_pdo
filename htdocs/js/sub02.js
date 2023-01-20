let conWrapHeight,
    contentsArr,
    initConWrap,
    initConWrapOpt,
    currentHref,
    hrefSplit,
    menuFilter,
    currentMenu;

$(document).ready(function () {

    if ($(".sub_depth_wrap li.link.depth2").val() == 0) {
        $(".sub_depth_wrap li.link.depth2").prev("li").css("display", "none");
    }

    // 메뉴 main 클래스 추가

    $(".sub_depth_wrap").addClass("menu");

    // 메뉴 depth2

    // $(".m__tab_wrap li.has > span").on("click", function () {
    //     $(".m__sub_tab_wrap").slideToggle(200).css("display", "flex");
    // })

    // 헤더 조작

    /*currentHref = window.location.href;
    hrefSplit = currentHref.split("?");
    menuArr = ["new", "beverage", "bakery", "MD"];
    menuFilter = hrefSplit.filter(el => menuArr.includes(el));
    currentMenu = menuArr.indexOf(String(menuFilter));

    if(currentMenu == 1){
        $(".m__sub_tab_wrap").slideDown(200).css("display", "flex");
    };

    $(".m__tab_wrap li.tab").removeClass("active");
    $("[data-menu_num='" + currentMenu + "']").addClass("active");

    $(".m__con_wrap").stop().fadeOut(200).removeClass("init");

    $(".m__con_wrap[data-menu_num='" + currentMenu + "']").addClass("init");
    $(".m__con_wrap[data-menu_num='" + currentMenu + "']").stop().fadeIn(200);
    conWrapArr();*/

    // 메뉴 탭

    $(".m__tab_wrap li.tab").on("click", function () {

        $(".m__tab_wrap li.tab").removeClass("active");
        $(this).addClass("active");

        /*$(".m__con_wrap").stop().fadeOut(200).removeClass("init");

        let dataMenuName = $(this).data("menu_name");
        $(".m__con_wrap[data-menu_name='" + dataMenuName + "']").addClass("init");
        $(".m__con_wrap[data-menu_name='" + dataMenuName + "']").stop().fadeIn(200);

        conWrapArr();*/
    });

    $(window).resize(function () {
        if ($(window).innerWidth() < 1025) {
            $('.m__con_wrap.init .stamp').remove();
        }
    });

});

// 메뉴 배치

function conWrapArr() {

    contentsArr = $(".m__con_wrap.init .m__con").get();
    if ($(".m__con_wrap.init .stamp").length > 1) {
        $(".m__con_wrap.init .stamp").not($(".stamp").get(1)).remove()
    }

    if ($(window).innerWidth() > 1025) {
        $(contentsArr[0]).after("<div class='" + "stamp'></div>");
    } else {
        $('.m__con_wrap.init .stamp').remove();
    }

    $(".m__con_wrap.init .stamp").css({
        width: $(".m__con_wrap.init .m__con").innerWidth(),
    });


    initConWrap = $(".m__con_wrap.init").masonry(initConWrapOpt);
    initConWrapOpt = {
        itemSelector: '.m__con',
        stamp: '.m__con_wrap.init .stamp',
        horizontalOrder: true,
        percentPosition: true,
        gutter: 30,
    }

    initConWrap.masonry("destroy");

    new WOW().init();
    initConWrap.masonry(initConWrapOpt);

}
conWrapArr();