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


Route::get('/',function (){
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('account-settings','UsersController@getSettings');
    Route::post('account-settings','UsersController@saveSettings');
});

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin'], function () {

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #User Management routes
    Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');
});


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


Route::resource('counter', 'Admin\\CounterController');
Route::get('counter/{id}/sharelink', 'Admin\\CounterController@getLink');
Route::get('counter/{id}/sharepage', 'Admin\\CounterController@getPage');
