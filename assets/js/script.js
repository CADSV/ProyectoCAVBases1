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


function RemoveWatchlist(button,IdContent, IdProfile){

    $(button).find("i").toggleClass("fas fa-check");
    $(button).find("i").toggleClass("fas fa-plus");

    $.post("../../data/ajax/removeWatchlist.php", { IdContent: IdContent, IdProfile: IdProfile }, function(data) {
        if(data !== null && data !== "") {
            alert(data);
        }
    })

}


function AddWatchlist(button,IdContent, IdProfile){

    $(button).find("i").toggleClass("fas fa-plus");
    $(button).find("i").toggleClass("fas fa-check");

    $.post("../../data/ajax/addWatchlist.php", { IdContent: IdContent, IdProfile: IdProfile }, function(data) {
        if(data !== null && data !== "") {
            alert(data);
        }
    })
}