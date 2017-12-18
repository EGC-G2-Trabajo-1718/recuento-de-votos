<?php


namespace App;
use Illuminate\Database\Eloquent\Model;


class User extends Model{

    protected $table = 'User';
    protected $primaryKey = 'auth_token';
    protected $fillable = ['auth_token'];
    protected $hidden = ['created_at','updated_at'];


}