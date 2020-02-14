<?php
abstract class Seguridad {
    /**
     * este método encripta una cadena
     * @param String $texto texto a encriptar
     * @return String texto encriptado
     */
    public static function encriptar($texto)
    {
        if (!$texto == null) {
            return base64_encode( convert_uuencode ($texto) );
        }
    }
    //-----------------------------------------------------------------------------------------------------------------
    /**
     * devuelve el valor de una una cadena encriptada usando el método encriptar
     * @param String $cadena cadena a desencriptar
     * @return String texto desencriptado
     */
    public static function desencriptar($cadena)
    {		
    	return convert_uudecode( base64_decode( $cadena ) );
    }
    //-----------------------------------------------------------------------------------------------------------------
}