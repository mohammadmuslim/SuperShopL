<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/try', function () {
    return view('Purchase.try');
});
Auth::routes();
Route::group(['namespace'=>'\App\Http\Controllers','middleware'=>'auth'],function() {
    Route::get('home', 'HomeController@index');
    Route::apiResource('categori', 'CategoriController');
    Route::get('create-categori', 'CategoriController@createCategori');
    Route::get('Cat-Sub/{id}', 'CategoriController@Cat_Sub');
    Route::apiResource('subCategori', 'SubCategoriController');
    Route::get('create-Subcategori', 'SubCategoriController@createSubCategori');
    Route::apiResource('supplier', 'SupplierController');
    Route::get('create-supplier', 'SupplierController@createSupplier');
    Route::get('searchSupplier', 'SupplierController@search');

    Route::apiResource('/brand', 'BrandController');
    Route::get('/brand-create', 'BrandController@create');
    Route::get('/brand-edit/{id}', 'BrandController@edit');
    Route::get('searchBrand', 'BrandController@search');

    Route::apiResource('/product', 'ProductController');
    Route::get('/product-create', 'ProductController@create');
    Route::get('/product-edit/{id}', 'ProductController@edit');

    Route::apiResource('/unite', 'UnitController');
    Route::get('/unite-create', 'UnitController@create');
    Route::get('/unite-edit/{id}', 'UnitController@edit');


    Route::apiResource('/purchase', 'PurchaseController');
    Route::get('/purchase-create', 'PurchaseController@create');
    Route::get('/purchase-edit/{id}', 'PurchaseController@edit');
    

    // Route::apiResource('products', 'ProductController');
    // Route::apiResource('supplier', 'SupplierController');
    // Route::apiResource('purchase', 'PurchaseController');
    // Route::apiResource('sales', 'SalesController');

    
});
