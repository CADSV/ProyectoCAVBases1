document.addEventListener("DOMContentLoaded", function(event) { 
    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }
    
    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }
    
    var pwShown = 0;
    
    // Se agregan event listeners a elementos html para poder realizar una acción

    document.getElementById("eyeButton").addEventListener("click", function () { // Cambiar la contraseña de no visible a visible (de tipo password a tipo text)
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);
    
    document.getElementById("eyeButton").addEventListener("click", function () { // Cambiar el ícono del ojo a visible o no visible
        eyeImage = document.getElementById("eyeImage");
        if (eyeImage.src == "http://localhost/ProyectoCAVBases1/assets/images/eye_outline_visibility_white_24dp.png") // El js detecta la dirección de los src de esta forma, hay que estar pendientes si cambia
        {
            eyeImage.src = "http://localhost/ProyectoCAVBases1/assets/images/eye_outline_visibility_off_white_24dp.png";
        }
        else 
        {
            eyeImage.src = "http://localhost/ProyectoCAVBases1/assets/images/eye_outline_visibility_white_24dp.png";
        }
    }, false);
});

