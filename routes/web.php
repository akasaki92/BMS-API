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

$router->group(['prefix' => 'v1'], function ($router) 
{
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
    $router->get('verify', ['as' => 'email.verify', 'uses' => 'AuthController@emailVerify']);
    $router->group(['middleware' => ['auth','verified']], function ($router) 
    {
        $router->get('/profile', 'AuthController@me');
        $router->get('/email-verification', ['as' => 'email.request.verification', 'uses' => 'AuthController@emailRequestVerification']);
        $router->get('index', 'DashboardController@index');
        $router->get('/langganan', 'LanggananController@index');
        $router->post('/langganan', 'LanggananController@store');
        $router->get('/langganan/{id}', 'LanggananController@show');
        $router->put('/langganan/{id}', 'LanggananController@update');
        $router->delete('/langganan/{id}', 'LanggananController@destroy');
    });
});
