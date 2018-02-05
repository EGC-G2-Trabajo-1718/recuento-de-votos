<?php
use App\EncryptUtil;

class EncryptTest extends TestCase
{
    public function testEmptyTextDecryptedNegativa()
    {
        print "Test Negativo";
        print "Test : Texto ha encriptar vacio";
        $encryptUtil = new EncryptUtil();
        $this->assertEquals(null,$encryptUtil->encrypt("","Almacen de votos"),"El texto ha encriptar no puede ser vacio");
    }


    public function testEmptyPasswordDecryptedNegativa()
    {
        print "Test Negativo";
        print "Test : Password para encriptar vacio";
        $encryptUtil = new EncryptUtil();
        $this->assertEquals(null,$encryptUtil->encrypt("Texto de prueba",""),"La password para encriptar no puede estar vacia");

    }


    public function testNotEmptyTextAndNotEmptyDecryptedPositiva()
    {
        print "Test Positivo";
        print "Test : Texto ha encriptar relleno y password rellena";
        $encryptUtil = new EncryptUtil();
        $res = $encryptUtil->encrypt("NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU=","Almacen de votos");
        $this->assertTrue($res != null,"Test correcto");
    }

}
