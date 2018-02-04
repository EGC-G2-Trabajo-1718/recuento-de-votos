<?php

use App\DescryptUtil;


class DecryptTest extends TestCase
{

    public function testEmptyTextDecryptedNegativa()
    {
        print "Test Negativo";
        print "Test : Texto ha desencriptar vacio";
        $descryptUtil = new DescryptUtil();
        $this->assertEquals(null,$descryptUtil->descrypt("","Almacen de votos"),"El texto ha desencriptar no puede ser vacio");
    }

    public function testEmptyPasswordDecryptedNegativa()
    {
        print "Test Negativo";
        print "Test : Password ha desencriptar vacio";
        $descryptUtil = new DescryptUtil();
        $this->assertEquals(null,$descryptUtil->descrypt("NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU=",""),"La password para desencriptar no puede estar vacia");

    }

    public function testEmptyTextDecryptedPositiva()
    {
        print "Test Positivo";
        print "Test : Texto ha desencriptar vacio";
        $descryptUtil = new DescryptUtil();
        $res = $descryptUtil->descrypt("NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU=","Almacen de votos");
        $this->assertTrue($res != null,"Test correcto");
    }

    public function testEncryptPositiva()
    {
        print "Test Positivo";
        print "Test : Texto ha desencriptar vacio";
        $descryptUtil = new DescryptUtil();
        $res = $descryptUtil->descrypt("NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU=","Almacen de votos");
        $this->assertTrue($res == 3,"Test correcto");
    }


}
