<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Products;
use App\Http\Controllers\deleteProduct;
use App\Models\Filter;
use App\Http\Controllers\User;
use App\Models\Data;

Route::get('/', function () {
    return view('productList',[
        "products" => Data::fetchAll('products'),
        "categorys" => Data::fetchAll('category'),
        "colors" =>Data::fetchCol("products","color")->distinct()->get(),
    ]);
});
Route::get('/adminList', function () {
    return view('list',[
        "products" => Data::fetchAll('products'),
        "categorys" => Data::fetchAll('category'),
    ]);
});
Route::get('/admin', function () {
    return view('admin',[
        "categorys" => Data::fetchAll('category'),
    ]);
});
Route::any('/filter/{keywords}/{criteries}/{sortBy}/{sortCol}/{from}/{to}', function ($keywords,$criteries, $sortBy,$sortCol,$from,$to) {
    return Filter::filter($keywords,$criteries,$sortBy,$sortCol,$from,$to);
});
Route::any('/sort/{sortBy}/{sortCol}', function ($sortBy,$sortCol) {
    return Filter::sort($sortBy,$sortCol);
});
Route::any('/adminFilter/{keywords}/{amount}', function ($keywords,$amount) {
    return Filter::adminFilter($keywords,$amount);
});
Route::any('clear', function () {
    return Filter::clear();
});
Route::any('search/{search}', function ($search) {
    return Filter::search($search);
});
Route::get('/list', function () {
    return view('productList',[]);
});
Route::get('/adminLogin', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('userLogin');
});
Route::post('insert',[Products::class, 'insert']);
Route::get('delete/{id}',[Products::class, 'delete']);
Route::get('edit/{id}',[Products::class, 'edit']);
Route::post('editProduct/{id}',[Products::class, 'editProduct']);
Route::post('loginAdmin',[User::class, 'checkAdmin']);
Route::post('loginUser',[User::class, 'checkUser']);
Route::post('register',[User::class, 'register']);







