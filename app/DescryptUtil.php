<?php

namespace App;


class DescryptUtil
{

    function __construct(){}

    function descrypt($encrypted){

        try{
            $method = 'aes-128-cbc';
            $clave = env('CLAVE');
            $texto_sin_base64 = base64_decode($encrypted);
            $iv = substr($texto_sin_base64, 0,16);
            $decrypted = openssl_decrypt(substr($texto_sin_base64, 16,strlen($texto_sin_base64)), $method, $clave, OPENSSL_RAW_DATA, $iv);
        }catch(Exception $e){
            error_log("Se ha producido un error no controlado en DescryptUtil",$e);
        }
        return $decrypted;

    }


}