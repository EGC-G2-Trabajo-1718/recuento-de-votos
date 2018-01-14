<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

<<<<<<< HEAD
$app->get('/polls', 'PollController@index');
$app->get('/polls/{id}/{auth}', 'PollController@getPollByUserAuthoritation');
$app->get('/polls/{auth}','PollController@getAllPollByUserAuthoritation');
$app->get('/vote/{id}/{auth}','PollController@getVotesByPoll');
$app->get('/questionpoll/{id}/{auth}','PollController@getQuestionByPoll');
$app->get('/optionspoll/{id}/{auth}','PollController@getOptionsByPoll');
=======
$app->get('api/vote/{token_bd}/{id}/{auth}','PollController@getVotesByPoll');
$app->get('api/test/vote/{token_bd}/{id}/{auth}','PollControllerTest@getVotesByPoll');

$app->get('api/optionspoll/{token_bd}/{id}/{auth}','PollController@getOptionsByPoll');
$app->get('api/test/optionspoll/{token_bd}/{id}/{auth}','PollControllerTest@getOptionsByPoll');


>>>>>>> Jesus

