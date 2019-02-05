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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Medcins','PatientController@getMedcin');
Route::get('/commande','PatientController@getCommande');
Route::post('/commande','PatientController@postCommande');
Route::get('/pharmacies','PatientController@getShowPharmacies');
Route::get('/pharmacie/{id}','PatientController@getShowPharmacie');
Route::post('/patient/ajouterproduit/{product}','PatientController@postAddproduct');
Route::get('/patient/ajouterproduit/{product}','PatientController@postAddproduct');
Route::post('/commande/delete/{id}','PatientController@postDeleteProduct');
Route::get('/patient/setordonnance/{id}','PatientController@setOrdonnance');
Route::post('/setdefaultPharmacie/{id}','PatientController@postDefaultPharmacie');
Route::post('/commande/valider','PatientController@validerCommande');

Route::get('/admin/pharmacie/create','AdminController@getCreatePharmacie');
Route::post('/admin/pharmacie/create','AdminController@postPharmacie');

Route::get('/admin/commandes/{idc}/livreur/{idl}','AdminController@affecterCommande');
Route::get('/admin/commande/{id}','AdminController@showCommande')->name('admin.commande');
Route::get('/admin/livreur/create','AdminController@getCreateLivreur');
Route::post('/admin/livreur/create','AdminController@postLivreur');

Route::get('/admin/commandes','AdminController@showCommandes');
Route::get('/admin/medcin/create','AdminController@getCreateMedcin');
Route::post('/admin/medcin/create','AdminController@postMedcin');

Route::get('/pharmacie','PharmacieController@showProducts');
Route::get('/pharmacie/produit/create','PharmacieController@getCreateProduit');
Route::post('/pharmacie/produit/create','PharmacieController@postCreateProduit');
Route::get('/pharmacie/produit/{id}/edit','PharmacieController@getEditProduit');
Route::post('/pharmacie/produit/{id}/edit','PharmacieController@postEditProduit');
Route::get('/pharmacie/produit/{id}/delete','PharmacieController@getDeleteProduit');
Route::get('/commandes','PharmacieController@showCommandes');
Route::get('/commandes/{id}','PharmacieController@showCommande');
Route::get('/commande/valider/{id}','PharmacieController@validerCommande');
Route::get('/commande/ignorer/{id}','PharmacieController@rejeterCommande');

Route::get('/pharmacie/edit','PharmacieController@getEditProfile');
Route::post('/pharmacie/edit','PharmacieController@postEditProfile');

Route::get('/medcin/envoyer','MedcinController@getEnvoyer');
Route::post('/medcin/envoyer','MedcinController@postEnvoyer');


Route::get('/livreur/commandes','LivreurController@showCommandes');
Route::get('/livreur/commandes/{id}','LivreurController@showCommande');
Route::get('/livreur/commande/valider/{id}','LivreurController@validerCommande');