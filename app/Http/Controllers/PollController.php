<?php
namespace App\Http\Controllers;
use App\PollOptionPoll;
use Illuminate\Http\Request;
use App\Poll;
use App\UserAuthPoll;
use App\Vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return response()->json($polls, 200);
    }
    public function getPollByUserAuthoritation($id,$auth)
    {
       if($id == null || $id== "" || $auth == null || $auth == ""){
            abort(400, 'Bad request');
        }else{
           $pollauthuser = UserAuthPoll::where('poll_id','=',$id)->Where('auth_token','=',$auth)->get();
           if($pollauthuser == null || count($pollauthuser) == 0){
               abort(403, 'Unauthorized action.');
           }else{
               $poll_id=0;
               foreach($pollauthuser as $key){
                   $poll_id = $key->poll_id;
               }
                $res =Poll::where('poll_id','=',$poll_id)->get();
                return response()->json($res, 200);
           }
        }
    }
    public function getAllPollByUserAuthoritation($auth)
    {
        if($auth == null || $auth == ""){
            abort(400, 'Bad request');
        }else{
            $pollsAuthuser = UserAuthPoll::where('auth_token','=',$auth)->get();
            if($pollsAuthuser == null || count($pollsAuthuser) == 0){
                abort(403, 'Unauthorized action.');
            }else{
                $poll_id=0;
                $res = array();
                foreach($pollsAuthuser as $key){
                    $poll_id = $key->poll_id;
                    array_push($res,Poll::where('poll_id','=',$poll_id)->get());
                }
                return response()->json($res, 200);
            }
        }
    }
    public function getVotesByPoll($id,$auth)
    {
        if($id == null || $id== "" || $auth == null || $auth == ""){
            abort(400, 'Bad request');
        }else{
            $pollauthuser = UserAuthPoll::where('poll_id','=',$id)->Where('auth_token','=',$auth)->get();
            if($pollauthuser == null || count($pollauthuser) == 0){
                abort(403, 'Unauthorized action.');
            }else{
                $poll_id=0;
                foreach($pollauthuser as $key){
                    $poll_id = $key->poll_id;
                }
                //select count(poll_option_id),poll_option_id from Vote where poll_id=1 GROUP by poll_option_id
                $votes = DB::table('Vote')->select(DB::raw('count(*) as poll_id,poll_option_id'))->where('poll_id','=',$poll_id)->groupBy('poll_option_id')->get();
                $resFinal = array();
                foreach($votes as $vote){
                    $poll_option_id = $vote->poll_option_id;
                    $count = $vote->poll_id;
                    $res = DB::table('Poll_Option')->select(DB::raw('option'))->where('poll_option_id','=',$poll_option_id)->get();
                    foreach($res as $value){
                        array_push($resFinal,$value->option,$count);
                    }
                }
                return response()->json($resFinal, 200);
            }
        }
    }
    public function getQuestionByPoll($id,$auth)
    {
        if($id == null || $id== "" || $auth == null || $auth == ""){
            abort(400, 'Bad request');
        }else{
            $pollauthuser = UserAuthPoll::where('poll_id','=',$id)->Where('auth_token','=',$auth)->get();
            if($pollauthuser == null || count($pollauthuser) == 0){
                abort(403, 'Unauthorized action.');
            }else{
                $poll_id=0;
                foreach($pollauthuser as $key){
                    $poll_id = $key->poll_id;
                }
                $res =Poll::where('poll_id','=',$poll_id)->get();
                $resFinal = array();
                foreach($res as $value){
                    array_push($resFinal,$value->question);
                }
                return response()->json($resFinal, 200);
            }
        }
    }
    public function getOptionsByPoll($id,$auth)
    {
        if($id == null || $id== "" || $auth == null || $auth == ""){
            abort(400, 'Bad request');
        }else{
            $pollauthuser = UserAuthPoll::where('poll_id','=',$id)->Where('auth_token','=',$auth)->get();
            if($pollauthuser == null || count($pollauthuser) == 0){
                abort(403, 'Unauthorized action.');
            }else{
                $poll_id=0;
                foreach($pollauthuser as $key){
                    $poll_id = $key->poll_id;
                }
                $res = DB::table('Poll_Option_Poll')->select(DB::raw('poll_option_id'))->where('poll_id','=',$poll_id)->get();
                $resFinal = array();
                foreach($res as $value){
                    //var_dump($value->poll_option_id);
                    $res1 = DB::table('Poll_Option')->select(DB::raw('option'))->where('poll_option_id','=',$value->poll_option_id)->get();
                    foreach($res1 as $value1){
                        //var_dump($value1);
                        array_push($resFinal,$value1);
                    }
                }
                return response()->json($resFinal, 200);
            }
        }
    }
}