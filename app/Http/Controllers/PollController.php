<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Poll;
use App\Vote;


class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return response()->json($polls, 200);
    }

    public function getPollByUserAuthoritation($id,$auth_token)
    {

        if($id == null || $id= "" || $auth_token == null || $auth_token = ""){
            abort(400, 'Bad request');

        }else{

            $res = app('db')->select("SELECT * FROM user_auth_poll where poll_id=".$id . " and auth_token= ".$auth_token);

            if($res != null){
                return response()->json($res, 200);

            }else{
                abort(403, 'Unauthorized action.');

            }
        }


    }


    /*public function createCategories(Request $request)
    {
        $categoria = Categories::create($request->all());
        return response()->json($categoria,201);
    }*/

    public function getVotesByPoll($id,$auth)
    {
        if ($id==null || $id=="" || $auth==null || $auth == ""){
            abort(400,'Bad request');
        }else{
            $pollauthuser = UserAuthPoll::wher('poll_id','=',$id)->Where('auth_token','=',$auth)->get();

            if($pollauthuser==null || count($pollauthuser)==0){
                abort(403,'Unauthorized action.');
            }else{
                $poll_id=0;
                foreach ($pollauthuser as $key){
                    $poll_id = $key->poll_id;
                }
                $res = DB::table('Poll_Option_Poll')->select(DB::raw('poll_option_id'))->where('poll_id','=',$poll_id)->get();
                $resFinal = array();

                foreach ($res as $value){
                    $res1 = DB::table('Poll_Option')->select(DB::raw('option'))->where('poll_option_id','=',$value->poll_option_id)->get();
                     foreach ($res1 as $value1){
                         array_push($resFinal,$value1);
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


}