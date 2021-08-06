$(document).Scroll(function(){
    
    var isScrolled = $(this).scrollTop() > $(".topBar").height();
    $(".topBar").toggleClass("scrolled",isScrolled);
})

function volumeToggle(button){

    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");

}

function previewEnded(){

    $(".previewVideo").toggle();
    $(".previewImage").toggle();
}

function goBack(idContent){
    window.location.href="contentPage.php?IdContent="+idContent;

}


function startHideTimer(){
    var timeout= null;

    $(document).on("mousemove",function(){
        clearTimeout(timeout);
        $(".watchNav").fadeIn();

        timeout= setTimeout(function(){
            $(".watchNav").fadeOut();
        },2000);

    })
}

function initVideo(){
    startHideTimer();
}

function PlayContent(idContent,ismovie){
    if (ismovie){
        window.location.href="WatchMovie.php?IdContent="+idContent;
    }else{
        window.location.href="episodePage.php?IdContent="+idContent;
    }
   
}