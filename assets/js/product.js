$(function(){
    $(".grid").masonry({ itemSelector: ".grid-item" });
    
    $(".filtering").on("click", "span", function () {
        var a = $(".gallery").isotope({});
        var e = $(this).attr("data-filter");
        a.isotope({ filter: e });
    });
    $(".filtering").on("click", "span", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
})