$(document).Scroll(function(){
    var isScrolled = $(this).scrollTop() > $(".topBar").height();
    $(".topBar").toggleClass("scrolled",isScrolled);
})