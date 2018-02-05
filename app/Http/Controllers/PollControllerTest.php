<?php


namespace App\Http\Controllers;
use App\EncryptUtil;
use App\PollOptionPoll;
use Illuminate\Http\Request;
use App\Poll;
use App\UserAuthPoll;
use App\Vote;
use App\DescryptUtil;




use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;




class PollControllerTest extends Controller
{

    function __construct(){}

    public function getVotesByPoll($token_bd,$token_votacion,$token_pregunta,$obj)
    {

        if($token_votacion == null || $token_votacion== "" ) {
            error_log("Error 404 , el token de votacion es nulo o no se encuentra");
            return -1;

        }else if($token_bd == "" || $token_bd == null){
            error_log("Error 404 , el token de base de datos es nulo o no se encuentra");
            return -1;


        }else if($token_pregunta == "" || $token_pregunta == null){
            error_log("Error 404 , el token de pregunta es nulo o no se encuentra");
            return -1;

        }else{
            try{
                $url_api = env('URL_ALMACENAMIENTO');
                $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

                //$jsonValidate = new UtilJson();
                //$json = file_get_contents($url_api);

                //s$obj = $jsonValidate->json_validate($json);
                //$obj = json_decode($json);


                if(!$this->isJSON($obj)){
                    return -1;
                }else{
                    $descryptUtil = new DescryptUtil();
                    $res = array();

                    $obj = json_decode($obj);

                    foreach($obj as $value){
                        array_push($res,$descryptUtil->descrypt($value->token_respuesta,"Almacen de votos"));

                    }
                    $resFinal = array_count_values($res);
                    $result = array("total_votes" => sizeof($res));

                    $encryptUtil = new EncryptUtil();
                    foreach($resFinal as $key=>$value){
                        $result[$encryptUtil->encrypt($key,"Almacen de votos")] = $value ;
                    }

                    return response()->json($result, 200);

                }


            }catch(Throwable $e){
                error_log("Ha ocurrido un error en el metodo getVotesByPoll");
                return -1;
            }




        }

    }



    public function getOptionsByPoll($token_bd,$token_votacion,$token_pregunta,$obj)
    {

        if($token_votacion == null || $token_votacion== "" ) {
            error_log("Error 404 , el token de votacion es nulo o no se encuentra");
            return -1;

        }else if($token_bd == "" || $token_bd == null){
            error_log("Error 404 , el token de base de datos es nulo o no se encuentra");
            return -1;


        }else if($token_pregunta == "" || $token_pregunta == null){
            error_log("Error 404 , el token de pregunta es nulo o no se encuentra");
            return -1;

        }else{

            try{
                $url_api = env('URL_ALMACENAMIENTO');
                $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

                //$json = file_get_contents($url_api);

                if(!$this->isJSON($obj)){
                    return -1;
                }else {

                    $obj = json_decode($obj);

                    $descryptUtil = new DescryptUtil();
                    $res = array();


                    foreach ($obj as $value) {
                        array_push($res, $descryptUtil->descrypt($value->token_respuesta, "Almacen de votos"));

                    }
                    $resFinal = array_count_values($res);

                    $encryptUtil = new EncryptUtil();
                    $result = array('options');
                    foreach ($resFinal as $key => $value) {
                        array_push($result, $encryptUtil->encrypt($key, "Almacen de votos"));

                    }


                        return response()->json($result, 200);

                }

            }catch(Exception $e){
                error_log("Ha ocurrido un error en el metodo getVotesByPoll");
                return -1;
            }





        }

    }

     public function getWinnerPoll($token_bd,$token_votacion,$token_pregunta)
     {

         if ($token_votacion == null || $token_votacion == "" || $token_pregunta == null || $token_pregunta == "" || $token_bd == "" || $token_bd == null) {
             abort(400, 'Bad request');

         } else {

             $url_api = env('URL_ALMACENAMIENTO');
             $url_api = $url_api . "/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

             //$json = file_get_contents($url_api);
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
             $obj = json_decode($json);
             $descryptUtil = new DescryptUtil();
             $res = array();


             foreach ($obj as $value) {
                 array_push($res, $descryptUtil->descrypt($value->token_respuesta));

             }
             $resFinal = array_count_values($res);
             $result = array("total_votes" => sizeof($res));

             $encryptUtil = new EncryptUtil();

             $resWinner = array();
             $i = 0;

             foreach ($resFinal as $key => $value) {
                 if ($i <= $value) {
                     $resWinner[$encryptUtil->encrypt($key)] = $value;
                     $i = $value;
                 }
             }


             return response()->json($resWinner, 200);

         }

     }

    function isJSON($string){
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

}