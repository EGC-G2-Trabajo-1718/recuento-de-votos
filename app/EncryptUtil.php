<?php

namespace App;


class EncryptUtil
{
    function __construct(){}

    function encrypt($textToEncrypt){

        try{
            $method = 'aes-256-cbc';
            $clave = env('CLAVE');
            $iv = 1234567890123456;
            $encrypted = base64_encode(openssl_encrypt($textToEncrypt, $method, $clave, OPENSSL_RAW_DATA, $iv));
        }catch(Exception $e){
            error_log("Se ha producido un error no controlado en EncrypttUtil",$e);
        }
        return $encrypted;
    }

}