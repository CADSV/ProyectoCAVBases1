$(document).Scroll(function(){
    var isScrolled = $(this).scrollTop() > $(".topBar").height();
    $(".topBar").toggleClass("scrolled",isScrolled);
})

function volumeToggle(button){
    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted);
}

function previewEnded(){
    $(".previewVideo").toggle();
    $(".previewImage").toggle();
}