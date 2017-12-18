<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class UserAuthPoll extends Model{

    protected $table = 'User_auth_Poll';
    protected $primaryKey = 'user_auth_poll_id';
    protected $fillable = ['user_auth_poll_id','auth_token','poll_id'];
    protected $hidden = ['created_at','updated_at'];

}