<?php

namespace App;


class EncryptUtil
{
    function __construct(){}

    function encrypt($textToEncrypt,$clave){
        $encrypted = null;
        try{

            if($textToEncrypt == "" || $textToEncrypt == null) {
                error_log("Eror al encriptar el texto no puede ser vacio o nulo");
            }else {

                if($clave == "" || $clave == null) {
                    error_log("La clave para desencriptar no puede ser vacio o nula");
                }else{

                    $method = 'aes-256-cbc';
                    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
                    $encrypted = base64_encode(openssl_encrypt($textToEncrypt, $method, $clave, OPENSSL_RAW_DATA, $iv));
                }
            }


        }catch(Exception $e){
            error_log("Se ha producido un error no controlado en EncrypttUtil",$e);
        }
        return $encrypted;
    }

}