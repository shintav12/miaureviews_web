<?php


Route::get("/","WebController@index");
Route::get("/{slug}","WebController@sections");
Route::get("/posts/{slug}","WebController@post");
Route::get("/videos/{slug}","WebController@video");
Route::get("/freebies/{slug}","WebController@freebie");
Route::get("/tags/{slug}","WebController@tags");
Route::get("/store/categories","WebController@store");
Route::get("/store/{product}","WebController@product");
Route::get("/freebie/download/{slug}","WebController@download");
