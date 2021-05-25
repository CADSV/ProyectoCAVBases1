<?php

class FormSanitizer {

    public static function  sanitizeFormString($inputText){   //Valida la entrada del nombre
        $inputText = strip_tags($inputText);      //Verificar que no haya etiquetas HTML en el controller.
        $inputText = trim($inputText);            //Elimina los espacios en blanco solo antes y después de los introducidos
        $inputText = strtolower($inputText);          //Pone todas las letras en minuscula
        $inputText = ucfirst($inputText);            //Pone la primera letra mayuscula
        return $inputText;

    }

    public static function  sanitizeFormNombreUsuario($inputText){   //Valida la entrada 
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText); //Elimina los espacios en blanco
       
        return $inputText;

    }

    public static function  sanitizeFormContrasena($inputText){   //Valida la entrada 
        $inputText = strip_tags($inputText);
       
       
        return $inputText;

    }

    public static function  sanitizeFormCorreo($inputText){   //Valida la entrada 
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText); //Elimina los espacios en blanco
       
        return $inputText;

    }


}

?>
