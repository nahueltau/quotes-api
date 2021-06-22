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
    return $router->app->version();
});


$router->group(['prefix'=>'quotes'], function () use ($router){
    $router->get('/', 'QuoteController@index');
    $router->get('/{id}', 'QuoteController@show');
    $router->post('/create', 'QuoteController@store');
    $router->put('/{id}', 'QuoteController@update'); 
    $router->delete('/{id}', 'QuoteController@delete');
});