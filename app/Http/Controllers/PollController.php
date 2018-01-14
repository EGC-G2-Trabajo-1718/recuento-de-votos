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




class PollController extends Controller
{


    public function getVotesByPoll($token_bd,$token_votacion,$token_pregunta)
    {

        if($token_votacion == null || $token_votacion== "" || $token_pregunta == null || $token_pregunta == ""){
            abort(400, 'Bad request');
            error_log("Error 400, alguna variable vacia o nula");

        }else{

            try{

                $url_api = env('URL_ALMACENAMIENTO');
                $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

                $json = file_get_contents($url_api);
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
            }catch(Exception $e){
                    error_log("Se ha producido un error no controlado en PollController",$e);
                }

            }

        }



    public function getOptionsByPoll($token_bd,$token_votacion,$token_pregunta)
    {

        if($token_votacion == null || $token_votacion== "" || $token_pregunta == null || $token_pregunta == ""){
            abort(400, 'Bad request');
            error_log("Error 400, alguna variable vacia o nula");

        }else{

            try{
                $url_api = env('URL_ALMACENAMIENTO');
                $url_api = $url_api ."/" . $token_bd . "/" . $token_votacion . "/" . $token_pregunta;

                $json = file_get_contents($url_api);


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
            }catch(Exception $e){
                error_log("Se ha producido un error no controlado en PollController",$e);
            }

        }

    }




}