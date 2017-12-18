<?php
/**
 * Created by PhpStorm.
 * User: alfon
 * Date: 18/12/2017
 * Time: 0:17
 */

namespace App;


class PollOptionPoll extends Model
{

    protected $table = 'Poll_Option_Poll';
    protected $primaryKey = 'poll_option_poll_id';
    protected $fillable = ['poll_id','poll_option_id'];
    protected $hidden = ['created_at','updated_at'];

}