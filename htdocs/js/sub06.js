let currentHref = window.location.href;

$(document).ready(function () {
  // back 높이

  function scr1BackInit() {
    $(".scr_back").css({
      height: $(".scr1__sec2_wrap").innerHeight() - 15,
    });

    $(window).resize(function () {
      $(".scr_back").css({
        height: $(".scr1__sec2_wrap").innerHeight() - 15,
      });
    });
  }
  scr1BackInit();

  // 메뉴 탭

  $(".sub_depth_wrap li.link.depth2").text("정기구독");

  $(".scr__tab_wrap li.tab").on("click", function () {
    $(".scr__tab_wrap li.tab").removeClass("active");
    $(this).addClass("active");

    let thisData = $(this).data("plan"),
      thisHtml = $(this).html(),
      thisTxt = $(this).text();

    $(".scr__box").stop().fadeOut(200).removeClass("active");
    $(".scr__box.scr" + thisData)
      .stop()
      .fadeIn(200)
      .addClass("active");

    $(".sub_title_wrap h1").html(thisHtml);
    $(".sub_depth_wrap li.link.depth2").text(thisTxt);

    if (thisData == 2) {
      $(".sub_title_btn_wrap").addClass("active");
    } else {
      $(".sub_title_btn_wrap").removeClass("active");
    }

    if ($(".scr__box.scr1").hasClass("active") == true) {
      $(".scr_back").css("display", "block");
      scr1BackInit();
    } else {
      $(".scr_back").css("display", "none");
    }
  });

  $(".sub_title_pop li p").on("click", function () {
    let thisData = $(this).data("plan"),
      thisHtml = $(this).html(),
      thisTxt = $(this).text();

    $(".scr__box").stop().fadeOut(200).removeClass("active");
    $(".scr__box.scr" + thisData)
      .stop()
      .fadeIn(200)
      .addClass("active");

    $(".sub_title_wrap h1").html(thisHtml);
    $(".sub_depth_wrap li.link.depth2").text(thisTxt);

    if (thisData == 2) {
      $(".sub_title_btn_wrap").addClass("active");
    } else {
      $(".sub_title_btn_wrap").removeClass("active");
    }

    if ($(".scr__box.scr1").hasClass("active") == true) {
      $(".scr_back").css("display", "block");
      scr1BackInit();
    } else {
      $(".scr_back").css("display", "none");
    }
  });

  // 링크연동

  if (currentHref.includes("scr2") == true) {

    let thisHtml = $(".scr__tab_wrap li[data-plan='2']").html();

    $(".sub_title_wrap h1").html(thisHtml);

    $(".sub_depth_wrap li.link.depth2").text("커피 케이터링/기업제휴");
    $(".scr__box").stop().fadeOut(200).removeClass("active");
    $(".scr__box.scr2").stop().fadeIn(200).addClass("active");
    $(".scr_back").css("display", "none");
    $(".sub_title_btn_wrap").addClass("active");
    
  }

});
