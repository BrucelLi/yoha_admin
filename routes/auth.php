<?php

/*
|--------------------------------------------------------------------------
| OAuth2 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
| Authorization
 */

$router->post('oauth/token', 'AccessTokenController@getToken');

// $router->group(['middleware' => 'auth'], function () use ($router) {
//     $router->get('oauth/tokens', 'AuthorizedAccessTokenController@forUser');
//     $router->delete('oauth/tokens/{token_id}', 'AuthorizedAccessTokenController@destroy');
//     $router->post('oauth/token/refresh', 'TransientTokenController@refresh');
//     $router->get('oauth/clients', 'ClientController@forUser');
//     $router->post('oauth/clients', 'ClientController@store');
//     $router->put('oauth/clients/{client_id}', 'ClientController@update');
//     $router->delete('oauth/clients/{client_id}', 'ClientController@destroy');
//     $router->get('oauth/scopes', 'ScopeController@all');
//     $router->get('oauth/personal-access-tokens', 'PersonalAccessTokenController@forUser');
//     $router->post('oauth/personal-access-tokens', 'PersonalAccessTokenController@store');
//     $router->delete('oauth/personal-access-tokens/{token_id}', 'PersonalAccessTokenController@destroy');
// });
