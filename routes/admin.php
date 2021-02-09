<?php

Route::get('/home', 'AdminController@home')->name('home');


//routes Categories
Route::get('/categories', "CategoriesController@index" )->name('categories.index');

Route::get('/categories/create','CategoriesController@create')->name("categories.create");
Route::post('/categories','CategoriesController@store')->name("categories.store");

Route::get('/categories/{id}/edit','CategoriesController@edit')->name("categories.edit");
Route::put('/categories/{id}', "CategoriesController@update" )->name('categories.update');

Route::delete('/categories/{id}','CategoriesController@destroy')->name("categories.destroy");


//routes produits

Route::get('/produits', "ProduitsController@index" )->name('produits.index');

Route::get('/produits/create', "ProduitsController@create" )->name('produits.create');
Route::post('/produits','ProduitsController@store')->name("produits.store");

Route::get('/produits/{id}/edit','ProduitsController@edit')->name("produits.edit");
Route::put('/produits/{id}', "ProduitsController@update" )->name('produits.update');

Route::delete('/produits/{id}','ProduitsController@destroy')->name("produits.destroy");



//route distribiteurs

Route::get("/distributeurs","DistributeursController@index")->name("distributeurs.index");

Route::get("/distributeurs/create","DistributeursController@create")->name("distributeurs.create");
Route::post('/distributeurs','DistributeursController@store')->name("distributeurs.store");

Route::get('/distributeurs/{id}/edit','DistributeursController@edit')->name("distributeurs.edit");
Route::put('/distributeurs/{id}', "DistributeursController@update" )->name('distributeurs.update');

Route::delete('/distributeurs/{id}','DistributeursController@destroy')->name("distributeurs.destroy");





//show types of commandes
//1  all commandes
Route::get('/commandes/all','CommandesController@getAllCommandes')->name("commandes.all");
//2 commande no livre
Route::get('/commandes/allNoLivre','CommandesController@getAllCommandesNoLivrer')->name("commandes.allNoLivre");
//3 commandes envoye
Route::get('/commandes/allsend','CommandesController@getAllCommandesSend')->name("commandes.allSend");
//4 commandes livrer
Route::get('/commandes/allLivre','CommandesController@getAllCommandesLivrer')->name("commandes.allLivre");

Route::get('/commandes/affecterDis/{id}','CommandesController@affecterDis')->name("commandes.affecterDis");

Route::post('/commandes/ajouterDisToCom','CommandesController@ajouterDisToCom')->name("commandes.ajouterDisToCom");



//routes client (users)
Route::get("/client","ClientController@index")->name("client.index");
//commande by client
Route::get("/client/commandes/{id}","ClientController@getCommandByClient")->name("client.getCommandByClient");

//routes des statistiques



Route::get('/statistique','StatistiqueController@index')->name('statistique.index');
//qauntite en stock
Route::get('/statistique/qteStock','StatistiqueController@qteStock')->name('statistique.qteStock');

//nombre command par day
Route::get('/statistique/nbComDate','StatistiqueController@nbComDate')->name('statistique.nbComDate');

Route::get('/statistique/argentTotalDate','StatistiqueController@argentTotelComDate')->name('statistique.argentTotelComDate');;
//
//
Route::post('/statistique/nbComDatePeriode','StatistiqueController@nbComDatePeriode')->name('statistique.nbComDatePeriode');

Route::post('/statistique/argentTotalDatePeriode','StatistiqueController@argentTotalDatePeriode')->name('statistique.argentTotalDatePeriode');;
//
/*
 * //routing from controller with function
Route::get('/contact', "PagesController@contact" );

//routing view from controller with function
//Route::get('/contactFromView', "PagesController@contactFromView" );


Route::get('/posts', "PostsController@index" )->name('posts.index');

Route::get('/posts/create','PostsController@create')->name("posts.create");
Route::post('/posts','PostsController@store')->name("posts.store");

Route::get('/posts/{id}', "PostsController@show" )->name('posts.show');

Route::get('/posts/{id}/edit','PostsController@edit')->name("posts.edit");
Route::put('/posts/{id}', "PostsController@update" )->name('posts.update');

Route::delete('/posts/{id}','PostsController@destroy')->name("posts.destroy");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
 *
 * */