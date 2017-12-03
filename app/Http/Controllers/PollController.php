<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Poll;


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

}