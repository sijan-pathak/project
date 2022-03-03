<?php
Use App\Http\Controllers\productController;
Use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

/*Route::get('/', function () {
    return view('welcome');
});*/
route::get('/welcome','productController@list');
Route::get('/add','productController@insert');

Route::post('/add','productController@storeProduct');

route::get('delete/{id}','productController@destroy');
route::get('edit/{id}','productController@edit');
route::post('update/{id}','productController@update'); 



// route::get('/login','productController@login');
// route::get('/dashboard','productController@dashboard');
// route::get('/customlogin','productController@customLogin');
// route::get('/registration','productController@registration');
// route::post('/customregistration','productController@customRegistration');
// route::get('/signout','productController@signOut');


 Auth::routes();

 Route::get('home', 'HomeController@index')->name('home');

route::get('/sendemail','productController@show');
Route::post('/sendemail/send','productController@send');


Route::get('/dropdown','productController@showPage')->name('dropdown');
Route::post('/getCity','productController@getCity')->name('getCity');
Route::post('/getState','productController@getState')->name('getState');
Route::post('/getWard','productController@getWard')->name('getWard');
