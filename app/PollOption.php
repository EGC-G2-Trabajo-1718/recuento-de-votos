<?php
/**
 * Created by PhpStorm.
 * User: alfon
 * Date: 18/12/2017
 * Time: 0:17
 */

namespace App;


class PollOption extends Model
{
    protected $table = 'Poll_Option';
    protected $primaryKey = 'poll_option_id';
    protected $fillable = ['option',];
    protected $hidden = ['created_at','updated_at'];

}