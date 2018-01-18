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

//GENERAL WEBSITE

Route::get('/', function () {
    return view('start');
})->name('home');  // Route to index page


Route::get('category/{category_id}', 'CategoryController@index')->name('category'); // Route to category catalog

Route::get('category/{category_id}/sub/{subcat_id}', 'SubCategoryController@index')->name('subcategory'); // Subcategory

Route::get('category/{category_id}/sub/{subcat_id}/brand/{brand_id}', 'BrandController@index')->name('brand'); // Brands

Route::get('category/{category_id}/sub/{subcat_id}/brand/{brand_id}/item/{item_id}', 'ItemController@index')
                                                    ->name('item'); // Item description display

Route::get('search', 'SearchController@index')->name('search_page');

Auth::routes(); // Auth's routes


/* END */


// Admin Panel
Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Admin\LoginController@loginFormDisplay')->name('loginForm');
Route::post('admin/login', 'Admin\LoginController@loginAttempt');
Route::get('admin/logout', 'Admin\LoginController@logout');

Route::get('admin/categories', 'Admin\AdminController@categories_index');
Route::post('admin/categories/add', 'Admin\AdminController@tryToAddCategory');
Route::post('admin/categories/edit', 'Admin\AdminController@tryToEditCategory');
Route::post('admin/categories/delete', 'Admin\AdminController@tryToDeleteCategory');

Route::post('admin/sub_categories/add', 'Admin\AdminController@tryToAddSUBCategory');
Route::post('admin/sub_categories/edit', 'Admin\AdminController@tryToEditSUBCategory');
Route::post('admin/sub_categories/delete', 'Admin\AdminController@tryToDeleteSUBCategory');

Route::post('admin/brands/add', 'Admin\AdminController@tryToAddBrand');
Route::post('admin/brands/edit', 'Admin\AdminController@tryToEditBrand');
Route::post('admin/brands/delete', 'Admin\AdminController@tryToDeleteBrand');

Route::post('admin/products/add', 'Admin\AdminController@tryToAddProduct');
Route::post('admin/products/edit', 'Admin\AdminController@tryToEditProduct');
Route::post('admin/products/delete', 'Admin\AdminController@tryToDeleteProduct');

Route::get('admin/products', 'Admin\AdminController@products_index')->name('products');
Route::get('admin/brands', 'Admin\AdminController@brands_index');
Route::get('admin/sub_categories', 'Admin\AdminController@subcats_index');

Route::post('admin/chars/add', 'Admin\AdminController@AddChar');
/* END */