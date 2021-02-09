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

Route::get('/', 'FrontednController@index')->name('site.home');



//show all product shop
route::get('/shop','FrontednController@shop')->name('shop');

//show product shop by categorie

route::get('/shop/categories/{id}','FrontednController@showParCategorie')->name('shop.categories');

//show product shop presonalser
route::post('/shop/personaliser','FrontednController@showPersonaliser')->name('shop.personaliser');

//show produit
Route::get('/shop/produit/{id}','FrontednController@showProduit')->name('shop.show.produit');

//add item to cart
Route::post('/shop/addToCart','FrontednController@addToCartSession')->name('shop.addtocart');


// show cart of product
Route::get('/shop/showcart','FrontednController@showCart')->name('shop.showcart');

// delete product from cart of product
Route::get('/shop/showcart/delete/{id}','FrontednController@deleteProduitCart')->name('shop.delete.produit');

// checkout pages
Route::get('/shop/checkout','FrontednController@checkout')->name("shop.order.checkout")->middleware('auth');


//valider and enregiter la commande
Route::get('/shop/passercommande','FrontednController@passerCommande')->name("shop.order.passerCommande");


Route::get('/mescommandes','FrontednController@mesCommandes')->name("client.mescommandes")->middleware('auth');


Route::get('/mescommandes/valider/{id}','FrontednController@mesCommandesValiderRecu')->name("client.mesCommandesValiderRecu")->middleware('auth');


Route::get("/contact",function (){
    return view("frontend.pages.contact");
});


Route::get("/about",function (){
    return view("frontend.pages.about");
});

//->middleware('auth')
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin_login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin_logout');

  /*
   * Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin_register');
  Route::post('/register', 'AdminAuth\RegisterController@register');
  */

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin_password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin_password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin_password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});








//dd session to cart
Route::get('/shop/ddsession','FrontednController@ddsession')->name('shop.ddsession');



Route::get('/test',function (){
    return view('frontend.pages.test2');
});
Route::get('/exixst/{id}','FrontednController@test');
