<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return  view('index');
});


$router->group(['prefix'=>'quotes'], function () use ($router){
    $router->get('/', 'QuoteController@index');
    $router->get('/{id}', 'QuoteController@show');
    $router->post('/create', 'QuoteController@store');
    $router->put('/{id}', 'QuoteController@update'); 
    $router->delete('/{id}', 'QuoteController@delete');
});
$router->group([
    'prefix' => 'api/meli'
], function () use ($router) {
    $router->get('/webhook', 'WebhookController@index');
    $router->post('/webhook', 'WebhookController@receive');
    $router->delete('/webhook/destroy', 'WebhookController@destroyAll');
    $router->delete('/webhook/{id}', 'WebhookController@destroy');
    $router->get('/webhook/{user_id}', 'WebhookController@show');
    
});