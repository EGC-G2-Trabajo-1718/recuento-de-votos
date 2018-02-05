<?php

use App\Http\Controllers\PollControllerTest;


class VotesApiTest extends TestCase
{



    public function testgetVotesByPollNegativo1()
    {
        print "Test Negativo";
        print "Test : Check parametros getVotesByPoll";
        $pollController = new PollControllerTest();



        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;




        $res = $pollController->getVotesByPoll("",2,1,$json);
        $this->assertEquals(-1,$res,"El parametro token_votacion esta vacio o no se ha encontrado");



    }

    public function testgetVotesByPollNegativo2()
    {
        print "Test Negativo";
        print "Test : Check parametros getVotesByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;



        $res = $pollController->getVotesByPoll(1,"",1,$json);
        $this->assertEquals(-1,$res,"El parametro token_bd esta vacio o no se ha encontrado");


    }

    public function testgetVotesByPollNegativo3()
    {
        print "Test Negativo";
        print "Test : Check parametros getVotesByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getVotesByPoll(1,1,"",$json);
        $this->assertEquals(-1,$res,"El parametro token_pregunta esta vacio o no se ha encontrado");


    }

    public function testgetVotesByPollPositivo1()
    {
        print "Test Positivo";
        print "Test : Check parametros getVotesByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getVotesByPoll(1,2,1,$json);
        $this->assertNotEquals(-1,$res,"Todo correcto");



    }

    public function testgetVotesByPollNegativo4()
    {
        print "Test Negativo";
        print "Test : Check json";

        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1"
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getVotesByPoll(1,2,1,$json);
        $this->assertEquals(-1,$res,"El parametro token_votacion esta vacio o no se ha encontrado");



    }




    public function testgetVotesByPollNegativo5()
    {
        print "Test Negativo";
        print "Test : Check parametros getOptionsByPoll";
        $pollController = new PollControllerTest();



        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;




        $res = $pollController->getOptionsByPoll("",2,1,$json);
        $this->assertEquals(-1,$res,"El parametro token_votacion esta vacio o no se ha encontrado");



    }

    public function testgetVotesByPollNegativo6()
    {
        print "Test Negativo";
        print "Test : Check parametros getOptionsByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;



        $res = $pollController->getOptionsByPoll(1,"",1,$json);
        $this->assertEquals(-1,$res,"El parametro token_bd esta vacio o no se ha encontrado");


    }

    public function testgetVotesByPollNegativo7()
    {
        print "Test Negativo";
        print "Test : Check parametros getOptionsByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getOptionsByPoll(1,1,"",$json);
        $this->assertEquals(-1,$res,"El parametro token_pregunta esta vacio o no se ha encontrado");


    }

    public function testgetVotesByPollPositivo2()
    {
        print "Test Positivo";
        print "Test : Check parametros getOptionsByPoll";
        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1",
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getOptionsByPoll(1,2,1,$json);
        $this->assertNotEquals(-1,$res,"Todo correcto");



    }

    public function testgetVotesByPollNegativo8()
    {
        print "Test Negativo";
        print "Test : Check json";

        $pollController = new PollControllerTest();

        $json = <<<EOF

                   {
                      "1": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                      },
                      "2": {
                          "id": "1",
                          "token_usuario": "1",
                          "token_pregunta": "1",
                          "token_respuesta": "4xXyB9FApWewjQjNI4SZGWqyTEPKH7b/hSxIsCQhqrw="
                      },
                          "3": {
                        "id": "1",
                        "token_usuario": "1",
                        "token_pregunta": "1"
                        "token_respuesta": "NLpGXg7r60dD9jyxl+o6O5YAk6eAfo9MhJ+JJYlScgU="
                    }
                }
EOF;
        $res = $pollController->getVotesByPoll(1,2,1,$json);
        $this->assertEquals(-1,$res,"El json se encuentra mal formado");



    }


}
