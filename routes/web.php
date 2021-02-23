<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'App\Http\Middleware\MID',], function ()  
     
    {
            Route::get('/Rdv/{id}/edit', 'RdvController@getEdit');
            Route::get('/Rdv/{id}/delete', 'RdvController@destroy');
            Route::post('/Rdv/edit', 'RdvController@modifier');
            Route::get('Rdv/etat/{id}', 'RdvController@etat');
            Route::resource('Rdv', 'RdvController');

            Route::get('/departement/{id}/edit', 'departementController@getEdit');
            Route::get('/departement/{id}/delete', 'departementController@destroy');
            Route::get('departemment/etat/{id}', 'departementController@etat');
            Route::post('/departement/edit', 'departementController@modifier');
            Route::resource('departement', 'departementController');

            Route::get('/dossier/{id}/edit', 'dossierController@getEdit');
            Route::get('/dossier/{id}/delete', 'dossierController@destroy');
            Route::get('/dossier/show/{id}', 'dossierController@getPostPdf');
            Route::post('/dossier/edit', 'dossierController@modifier');
            //Route::get('/dossier/add', 'dossierController@create');
            Route::resource('dossier', 'dossierController');

            Route::get('/piece/{id}/edit', 'pieceController@getEdit');
            Route::get('/piece/{id}/delete', 'pieceController@destroy');
            Route::post('/piece/edit', 'pieceController@modifier');
            //Route::get('/dossier/add', 'dossierController@create');
            Route::resource('piece', 'pieceController');

            Route::get('/visite/{id}/edit', 'visiteController@getEdit');
            Route::get('/visite/{id}/delete', 'visiteController@destroy');
            Route::post('/visite/edit', 'visiteController@modifier');
            Route::resource('visite', 'visiteController');

            Route::get('/visiteur/{id}/edit', 'visiteurController@getEdit');
            Route::get('/visiteur/{id}/delete', 'visiteurController@destroy');
            Route::post('/visiteur/edit', 'visiteurController@modifier');
            Route::resource('visiteur', 'visiteurController');

            Route::get('/titre/{id}/edit', 'titreController@getEdit');
            Route::get('/titre/{id}/delete', 'titreController@destroy');
            Route::post('/titre/edit', 'titreController@modifier');
            Route::resource('titre', 'titreController');

            Route::get('/type_piece/{id}/edit', 'type_pieceController@getEdit');
            Route::get('/type_piece/{id}/delete', 'type_pieceController@destroy');
            Route::get('/type_piece/all', 'type_pieceController@all');
            Route::post('/type_piece/edit', 'type_pieceController@modifier');
            Route::resource('type_piece', 'type_pieceController');

            Route::get('/personnel/{id}/edit', 'personnelController@getEdit');
            Route::get('/personnel/{id}/delete', 'personnelController@destroy');
            Route::post('/personnel/edit', 'personnelController@modifier');
            Route::post('personnel', 'personnelController@storeu');
            Route::resource('personnel', 'personnelController');

            Route::get('/responsable/{id}/edit', 'ResponsableController@getEdit');
            Route::get('/responsable/{id}/delete', 'ResponsablerController@destroy');
            Route::post('/responsable/edit', 'ResponsableController@modifier');
            Route::resource('responsable', 'ResponsableController');

            Route::get('/reception/{id}/edit', 'ReceptionController@getEdit');
            Route::get('/reception/{id}/delete', 'ReceptionController@destroy');
            Route::post('/reception/edit', 'ReceptionController@modifier');
            Route::resource('reception', 'ReceptionController');

            Route::get('dashboard/nbVisite', 'DashController@nbVisite');
            Route::get('dashboard/nbVisiteur', 'DashController@nbVisiteur');
            Route::get('dashboard/nbRdv', 'DashController@nbRdv');
            Route::get('dashboard/nbDossier', 'DashController@nbDossier');

            Route::resource('dashboard', 'DashController');

            Route::get('/search', 'SearchController@index');


    });
Route::group(['middleware' => 'App\Http\Middleware\MID1',], function () 
{  
    Auth::routes();
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\LoginController@logout');




