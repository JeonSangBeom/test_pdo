$(document).ready(function () {

    // 검색 포커스
    
    $(".s04__search .type_search_wrap input").on("focus",function(){
        $(".s04__search").addClass("focus");
    })
    
    $(".s04__search .type_search_wrap input").on("blur",function(){
        $(".s04__search").removeClass("focus");
    })

});