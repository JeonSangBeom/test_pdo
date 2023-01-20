let headerBackHeightPc,
  headerDepth2HeightPc,
  currentUrl,
  urlSplit,
  urlObj,
  depth1Filter,
  depth1Idx,
  depth2Filter,
  depth2Str,
  selectDepth2,
  subPageDepthAnc;

$(document).ready(function () {
  new WOW().init();

  // 서브페이지 경로

  currentUrl = window.location.pathname;
  urlSplit = currentUrl.split("/");
  urlObj = {
    depth1: ["sub01", "sub02", "sub03", "sub04", "sub05", "sub06"],
    depth1Name: ["PARANOID", "MENU", "STORE", "NOTICE", "CONTACT", "SUBSCRIBE"],
    depth2: [
      "info.php",
      "branch.php",
      "news.php",
      "press.php",
      "proposal.php",
      "franchise.php",
      "subscribe.php",
    ],
  };
  depth1Filter = urlObj.depth1.filter((el) => urlSplit.includes(el));
  depth2Filter = urlObj.depth2.filter((el) => urlSplit.includes(el));
  depth1Idx = urlObj.depth1.indexOf(String(depth1Filter));
  depth2Str = urlObj.depth2.indexOf(String(depth2Filter));
  selectDepth2 = $("[data-depth='" + depth2Str + "']").text();

  $(".sub_depth_wrap li.link.depth1").text(urlObj.depth1Name[depth1Idx]);
  $(".sub_depth_wrap li.link.depth2").text(selectDepth2);

  //서브페이지 header
  if (currentUrl.includes("sub") == true) {
    $("header").addClass("scrolled");
  }

  // header back 높이 조정

  headerDepth2HeightPc = Math.max.apply(
    null,
    $(".h__depth2")
      .map(function () {
        return $(this).innerHeight();
      })
      .get()
  );

  headerBackHeightPc = headerDepth2HeightPc + $("header").innerHeight() + 30;
  $(".header_back_pc").css("height", headerBackHeightPc);

  $(window).resize(function () {
    headerBackHeightPc =
      $(".h__depth2").innerHeight() + $("header").innerHeight();
    $(".header_back_pc").css("height", headerBackHeightPc);
  });

  // nav 호버
  $(".header_wrap nav").on("mouseenter", function () {
    $(".h__depth2").stop().fadeIn(400).css("display", "flex");
    $(".header_back_pc").addClass("active");
  });

  $(".header_wrap nav").on("mouseleave", function () {
    $(".h__depth2").stop().fadeOut(100);
    $(".header_back_pc").removeClass("active");
  });

  // 햄버거 버튼
  $(".header_ham_btn").on("click", function () {
    $(this).toggleClass("active");
    $(".dropdown_full").toggleClass("active");
    $(".drop_f__depth1 li p").toggleClass("wow");
    $(".drop_f__depth2.init").toggleClass("wow");
  });

  // 햄버거 드롭 메뉴

  $(".drop_f__depth1 li").on("click", function () {
    let thisData = $(this).data("drop");
    $(".drop_f__depth1 li").removeClass("active");
    $(this).addClass("active");
    $(".drop_f__depth2").stop().fadeOut(0).removeClass("init");
    $(".drop_f__depth2.num" + thisData)
      .stop()
      .fadeIn(200)
      .css("display", "flex");
  });

  // 검색어 삭제 버튼

  $("button.clear").on("click", function () {
    $(".type_search_wrap input").val("");
    $("button.clear").hide();
  });

  $(".type_search_wrap input").on("input", function () {
    $("button.clear").show();
    if ($(".type_search_wrap input").val() == "") {
      $("button.clear").hide();
    }
  });

  // 레이어 팝업
  layerPop();
});

function layerPop() {
  $(".layer_pop_btn").on("click", function () {
    let layerData = $(this).data("layer");

    if (currentUrl.includes("index") != true) {
      $("html").css({
        overflow: "hidden",
      });
    }

    $(".l__pop_up_con").css("display", "none");
    $(".l__pop_up_con" + "." + layerData).css("display", "flex");
    $(".layer_pop_up").stop().fadeIn(200).css("display", "flex");
  });

  // 뉴스레터 구독하기 팝업

  $(".form_pop_btn").on("click", function () {
    if (currentUrl.includes("index") != true) {
      $("html").css({
        overflow: "hidden",
      });
    }

    // $(".l__pop_up_con" + "." + layerData).css("display", "flex");
    $(".form_pop_up").stop().fadeIn(200).css("display", "flex");
  });

  $(".l__pop_up_close_btn").on("click", function () {
    if (currentUrl.includes("index") != true) {
      $("html").css({
        "overflow-y": "auto",
      });
    }

    $(".layer_pop_up").stop().fadeOut(200);
  });

  $(".l__pop_up_back").on("click", function () {
    if (currentUrl.includes("index") != true) {
      $("html").css({
        "overflow-y": "auto",
      });
    }

    $(".layer_pop_up").stop().fadeOut(200);
    $(".form_pop_up").stop().fadeOut(200);
  });
}
