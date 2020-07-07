<?php

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
$router->get('foo', function () {
    return 'Hello World';
});

  /*                   API USER                    */
$router->group(['prefix' => 'api/user'], function () use ($router) {

   $router->get('getall',  ['uses' => 'UserController@getall']);
   $router->get('show/{id}', ['uses' => 'UserController@show']);
   $router->delete('delete/{id}', ['uses' => 'UserController@destroy']);
   $router->post('store', ['uses' => 'UserController@store']);
   $router->put('update/{id}', ['uses' => 'UserController@update']);
   $router->get('getUserProfil', ['uses' => 'UserController@GetUserProfil']);
   $router->get('GetLogin/{login}/{password}', ['uses' => 'UserController@GetLogin']);

  });
    /*                   API FOURNISSEUR                   */
$router->group(['prefix' => 'api/fournisseur'], function () use ($router) {

   $router->get('getall',  ['uses' => 'FournisseurController@getall']);
   $router->get('show/{id}', ['uses' => 'FournisseurController@show']);
   $router->delete('delete/{id}', ['uses' => 'FournisseurController@destroy']);
   $router->post('store', ['uses' => 'FournisseurController@store']);
   $router->put('update/{id}', ['uses' => 'FournisseurController@update']);

  });
  /*                   API TYPEPAIEMENT                    */
  $router->group(['prefix' => 'api/typepaiement'], function () use ($router) {

    $router->get('getall',  ['uses' => 'TypepaiementController@getall']);
    $router->get('show/{id}', ['uses' => 'TypepaiementController@show']);
    $router->delete('delete/{id}', ['uses' => 'TypepaiementController@destroy']);
    $router->post('store', ['uses' => 'TypepaiementController@store']);
    $router->put('update/{id}', ['uses' => 'TypepaiementController@update']);

   });

   /*                   API MOIS                     */
  $router->group(['prefix' => 'api/mois'], function () use ($router) {

    $router->get('getall',  ['uses' => 'MoisController@getall']);
    $router->get('show/{id}', ['uses' => 'MoisController@show']);
    $router->delete('delete/{id}', ['uses' => 'MoisController@destroy']);
    $router->post('store', ['uses' => 'MoisController@store']);
    $router->put('update/{id}', ['uses' => 'MoisController@update']);

   });
   /*                   API ANNEE                    */
  $router->group(['prefix' => 'api/annee'], function () use ($router) {

    $router->get('getall',  ['uses' => 'AnneeController@getall']);
    $router->get('show/{id}', ['uses' => 'AnneeController@show']);
    $router->delete('delete/{id}', ['uses' => 'AnneeController@destroy']);
    $router->post('store', ['uses' => 'AnneeController@store']);
    $router->put('update/{id}', ['uses' => 'AnneeController@update']);
    $router->get('UpdateAnneeEtat/{id}', ['uses' => 'AnneeController@UpdateAnneeEtat']);

   });
   /*                   API FACTURE                  */
  $router->group(['prefix' => 'api/facture'], function () use ($router) {

    $router->get('getall',  ['uses' => 'FactureController@getall']);
    $router->get('show/{id}', ['uses' => 'FactureController@getVente']);
    $router->delete('delete/{id}', ['uses' => 'FactureController@destroy']);
    $router->post('store', ['uses' => 'FactureController@store']);
    $router->put('update/{id}', ['uses' => 'FactureController@update']);
    $router->get('GetAnneeEncours', ['uses' => 'FactureController@GetAnneeEncours']);
   });






