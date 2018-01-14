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

$app->get('api/vote/{token_bd}/{id}/{auth}','PollController@getVotesByPoll');
$app->get('api/test/vote/{token_bd}/{id}/{auth}','PollControllerTest@getVotesByPoll');

$app->get('api/optionspoll/{token_bd}/{id}/{auth}','PollController@getOptionsByPoll');
$app->get('api/test/optionspoll/{token_bd}/{id}/{auth}','PollControllerTest@getOptionsByPoll');


<<<<<<< HEAD

=======
>>>>>>> 8d9433d63ff2833db31136a146dea7b222c8c2ee
