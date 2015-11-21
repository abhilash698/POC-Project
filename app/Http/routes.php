<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',  function () {
    return view('welcome');
});




/*Admin Routes*/
Route::group(array('prefix'=> 'superadmin', 'before' => 'auth.superadmin'), function() {

    // Show Dashboard (url: http://yoursite.com/admin)
    Route::get('/', function(){
        return Redirect::to('/superadmin/stores');
    });
    
    Route::get('/stores', 'SuperAdminController@getAllStores');
    Route::get('/addstore', 'SuperAdminController@getAddstore');
    Route::get('/editstore/{store_id}', 'SuperAdminController@getEditstore');
    Route::get('/addform/{store_id}', 'SuperAdminController@getAddform');
    Route::get('/editform/{form_id}', 'SuperAdminController@getEditform');
    Route::get('/addelements/{form_id}', 'SuperAdminController@getAddElements');

    Route::get('/deleteform/{form_id}', 'SuperAdminController@deleteForm');

    Route::post('/addstore', 'SuperAdminController@addstore');
    Route::post('/updatestore', 'SuperAdminController@updateStore');
    Route::post('/addform', 'SuperAdminController@addForm');
    Route::post('/editform', 'SuperAdminController@editForm');
    Route::post('/saveElement', 'SuperAdminController@saveElement');


});

/*Admin Routes*/
Route::group(array('prefix'=> 'storeadmin', 'before' => 'auth.storeadmin'), function() {

    // Show Dashboard (url: http://yoursite.com/admin)
    Route::get('/', function(){
        return Redirect::to('/storeadmin/stores');
    });
    
    Route::get('/stores', 'StoreAdminController@getAllStores');
    //Route::get('/addstore', 'StoreAdminController@getAddstore');
    Route::get('/editstore/{store_id}', 'StoreAdminController@getEditstore');
    Route::get('/addform/{store_id}', 'StoreAdminController@getAddform');
    Route::get('/editform/{form_id}', 'StoreAdminController@getEditform');
    Route::get('/addelements/{form_id}', 'StoreAdminController@getAddElements');

    Route::get('/deleteform/{form_id}', 'StoreAdminController@deleteForm');

    //Route::post('/addstore', 'StoreAdminController@addstore');
    Route::post('/updatestore', 'StoreAdminController@updateStore');
    Route::post('/addform', 'StoreAdminController@addForm');
    Route::post('/editform', 'StoreAdminController@editForm');
    Route::post('/saveElement', 'StoreAdminController@saveElement');


});

Route::filter('auth.superadmin', function(){

    if (Auth::check()) {
        if ( ! Auth::user()->superuser)
        {
            return Redirect::to('/storeadmin/Dashboard')
             ->withError('No Admin, sorry.');
        }
    }
    else{
        return Redirect::to('/auth/login')
             ->withError('Not loggind in');
    }
    

});

Route::filter('auth.storeadmin', function(){

    if (Auth::check()) {
        if ( Auth::user()->superuser)
        {
            return Redirect::to('/superadmin/stores');
        }
    }
    else{
        return Redirect::to('/auth/login')
             ->withError('Not loggind in');
    }
    

});


/*API Routes*/
Route::group(array('prefix'=> 'api', 'before' => 'auth.storeadmin'), function() {
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('/store', 'ApiController@getAllStores');
    Route::get('/savedata', 'ApiController@saveData');
    Route::get('/forms', 'ApiController@getAllForms');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');