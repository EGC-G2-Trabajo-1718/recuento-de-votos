<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Poll extends Model{


    protected $table = 'Poll';
    protected $primaryKey = 'poll_id';
    protected $fillable = ['poll_id','title','results','result','begin_date','finish_date','total_voters','total_votes','question','options','stauts'];
    protected $hidden = ['created_at','updated_at'];



}