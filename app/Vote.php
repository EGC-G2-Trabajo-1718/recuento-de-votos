<?php
/**
 * Created by PhpStorm.
 * User: alfon
 * Date: 18/12/2017
 * Time: 10:12
 */

namespace App;


class Vote extends Model
{

    protected $table = 'Vote';
    protected $primaryKey = 'vote_id';
    protected $fillable = ['vote_id','poll_id','poll_option_id'];
    protected $hidden = ['created_at','updated_at'];

}