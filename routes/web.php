<?php


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// any route
// Route::get('/{any}','HomeController@index')->where('any', '^(?!api).*');

Route::get('api/logout','Auth\LoginController@userLogout')->name('user.logout');



Route::get('/search-blog/','Frontend\HomeController@searchBlog');

Route::get('/',function(){
    return view('frontend.layout');
});
