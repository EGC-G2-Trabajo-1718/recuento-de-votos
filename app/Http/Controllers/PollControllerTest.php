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

    public function getVotesByPoll($token_bd,$token_votacion,$token_pregunta)
    {

        if($token_votacion == null || $token_votacion== "" || $token_pregunta == null || $token_pregunta == "" || $token_bd == "" || $token_bd == null){
            abort(400, 'Bad request');

        }else{

            $url_api = env('URL_ALMACENAMIENTO');
            $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

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


            foreach($obj as $value){
                array_push($res,$descryptUtil->descrypt($value->token_respuesta));

            }
            $resFinal = array_count_values($res);
            $result = array("total_votes" => sizeof($res));

            $encryptUtil = new EncryptUtil();
            foreach($resFinal as $key=>$value){
                $result[$encryptUtil->encrypt($key)] = $value ;
            }



            return response()->json($result, 200);

        }

    }



    public function getOptionsByPoll($token_bd,$token_votacion,$token_pregunta)
    {

        if($token_votacion == null || $token_votacion== "" || $token_pregunta == null || $token_pregunta == "" || $token_bd == "" || $token_bd == null){
            abort(400, 'Bad request');

        }else{

            $url_api = env('URL_ALMACENAMIENTO');
            $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

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


            foreach($obj as $value){
                array_push($res,$descryptUtil->descrypt($value->token_respuesta));

            }
            $resFinal = array_count_values($res);

            $encryptUtil = new EncryptUtil();
            $result = array('options');
            foreach($resFinal as $key=>$value){
                array_push($result,$encryptUtil->encrypt($key));

            }



            return response()->json($result, 200);

        }

    }

     public function getWinnerPoll($token_bd,$token_votacion,$token_pregunta)
    {

        if($token_votacion == null || $token_votacion== "" || $token_pregunta == null || $token_pregunta == "" || $token_bd == "" || $token_bd == null){
            abort(400, 'Bad request');

        }else{

            $url_api = env('URL_ALMACENAMIENTO');
            $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

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


            foreach($obj as $value){
                array_push($res,$descryptUtil->descrypt($value->token_respuesta));

            }
            $resFinal = array_count_values($res);
            $result = array("total_votes" => sizeof($res));

            $encryptUtil = new EncryptUtil();

            $resWinner = array();
            $i=0;

            foreach($resFinal as $key=>$value){
                if($i <= $value){
                    $resWinner[$encryptUtil->encrypt($key)] = $value;
                    $i = $value;
                }
            }



            return response()->json($resWinner, 200);

        }



}