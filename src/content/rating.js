document.addEventListener("DOMContentLoaded", function(event) { // Se carga el js solo después que cargue el documento, para evitar null

    const starTotal = 5;

    const starPercentage = (AvgRating / starTotal) * 100;

    const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;

    document.querySelector(`.stars-inner`).style.width = starPercentageRounded; 

});