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
Auth::routes(['verify' => true ]);

Route::get('/', 'Auth\LoginController@login')->name('/');

Route::post('logon', [ 'as' => 'login.authorize', 'uses' => 'Auth\LoginController@authorizing']);

Route::get('/logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/main', 'MenuController@index')->name('main');

Route::get('/menu/{id}', 'MenuController@show')->name('menu');

//Postes
Route::get('/postes', 'PosteController@getPostes')->name('postes');
Route::get('/postes/{id}/add', 'PosteController@create')->name('postes.create');
Route::post('/postes/{id}/store', ['as' => 'postes.store', 'uses' => 'PosteController@store']);

//Employés
Route::get('/employe/{id}', 'EmployeController@index')->name('employe');
Route::get('/employe/{id}/add', 'EmployeController@create')->name('employe.create');
Route::post('/employe/{id}/store', ['as' => 'employe.store', 'uses' => 'EmployeController@store']);
Route::get('/employe/{id}/edit', ['as' => 'employe.edit', 'uses' => 'EmployeController@edit']);
Route::post('/employe/{id}/update', ['as' => 'employe.update', 'uses' => 'EmployeController@update']);
Route::get('/employe', 'EmployeController@getEmploye');
Route::get('getDatas', 'EmployeController@getEmployePoste');
Route::get('/employes', 'EmployeController@getEmployes');
Route::post('/employe/{id}/affectation', ['as' => 'employe.affectation', 'uses' => 'EmployeController@affectation']);

//Salaires
Route::get('/salaire/{id}', 'SalaireController@index')->name('salaire');
Route::post('/salaire/{id}/store', ['as' => 'salaire.store', 'uses' => 'SalaireController@store']);
Route::get('/search', 'SalaireController@searchSalaries');

//Congés
Route::get('/conges/{id}', 'CongeController@index')->name('conges');
Route::get('/conges/{id}/add', 'CongeController@create')->name('conges.create');
Route::post('/conges/{id}/store', ['as' => 'conges.store', 'uses' => 'CongeController@store']);
Route::get('/conges/{id}/edit', ['as' => 'conges.edit', 'uses' => 'CongeController@edit']);
Route::post('/conges/{id}/update', ['as' => 'conges.update', 'uses' => 'CongeController@update']);

//Users & Profiles
Route::get('/user', 'UserController@getUser');
Route::get('/users/{id}', 'UserController@index')->name('users');
Route::get('/users/{id}/add', 'UserController@create')->name('users.create');
Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('/users/{id}/store', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::post('/users/{id}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('/profiles/{id}', 'ProfilController@index')->name('profiles');
Route::post('/profiles/{id}/store', ['as' => 'profiles.store', 'uses' => 'ProfilController@store']);
Route::get('/profil', 'ProfilController@getProfil')->name('profil');

//Modules et sous Modules
Route::get('/modules', 'ModuleController@getModule')->name('modules');
Route::get('/module/{id}', 'ModuleController@index')->name('modules');
Route::get('/submodule/{id}', 'ModuleController@indexSubModule')->name('submodules');
Route::post('/module/{id}/store', ['as' => 'modules.store', 'uses' => 'ModuleController@store']);

//Services
Route::get('/service', 'ServiceController@getService')->name('service');
Route::get('/services', 'ServiceController@getServices');
Route::get('/services/single', 'ServiceController@getSingleService');
Route::get('/services/{id}', 'ServiceController@index')->name('services');
Route::post('/services/{id}/store', ['as' => 'services.store', 'uses' => 'ServiceController@store']);


//Produits
Route::get('/produit', 'ProduitController@getProduit')->name('produit');
Route::get('/produits', 'ProduitController@getProduits');
Route::get('/produits/{id}', 'ProduitController@index')->name('produits');
Route::post('/produits/{id}/store', ['as' => 'produits.store', 'uses' => 'ProduitController@store']);

//Clients
Route::get('/clients/{id}', 'ClientController@index')->name('clients.index');
Route::get('/client', 'ClientController@confirm')->name('clients.confirm');
Route::get('/client/{id}/souscriptions', 'ClientController@mesSouscriptions')->name('clients.souscriptions');
Route::get('/client/get', 'ClientController@getClient');
Route::get('/clients/{id}/add', 'ClientController@create')->name('clients.create');
Route::get('/clients/{id}/edit', 'ClientController@edit')->name('clients.edit');
Route::post('/clients/{id}/update', 'ClientController@update')->name('clients.update');
Route::post('/clients/store', 'ClientController@store');
Route::post('/clients/souscription', 'ClientController@storeSouscription');

//Souscriptions
Route::get('/souscriptions/{id}', 'SouscriptionController@index')->name('souscriptions.index');
Route::get('/souscriptions/{id}/suspensions', 'SouscriptionController@clientsSuspendus')->name('souscriptions.suspensions');
Route::post('/souscriptions/validate', 'SouscriptionController@validatation')->name('souscription.validate');
Route::post('/souscriptions/suspend', 'SouscriptionController@suspension')->name('souscription.suspend');
Route::post('/souscriptions/reactivate', 'SouscriptionController@reactiver')->name('souscription.reactivate');
Route::get('/souscriptions/{id}/stats', 'SouscriptionController@afficherStats')->name('souscriptions.stats');

//Factures
Route::get('/factures/{id}', 'FactureController@index')->name('factures.redevances');
Route::post('/factures/paiement', 'FactureController@paiement')->name('factures.paiement');

//Paiements
Route::get('/paiements/{id}', 'PaiementController@index')->name('paiements.index');

//Planifications
Route::get('/planifications/{id}', 'PlanificationController@index')->name('planifications.index');
Route::get('/planifications/{id}/create', 'PlanificationController@create')->name('planifications.create');
Route::post('/planifications/{id}/store', 'PlanificationController@store')->name('planifications.store');
Route::get('/sites', 'PlanificationController@getSites');
Route::get('/equipe', 'PlanificationController@getTeam');
Route::get('/installations/{id}', 'InstallationController@index')->name('installations.index');
Route::post('/installations/{id}/store', 'InstallationController@store')->name('installations.store');
Route::get('/installations/{id}/stats', 'InstallationController@afficherStats')->name('installations.stats');
