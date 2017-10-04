<?php


Route::get('/',array('as'=>'index','uses'=>'SayfaController@getIndex'));
Route::post('/kaydet',array('as'=>'kaydet','uses'=>'SayfaController@postKaydet'));
Route::get('/sil/{id?}',array('as'=>'sil','uses'=>'SayfaController@getSil'));
Route::get('/guncelle/{id?}',array('as'=>'guncelle','uses'=>'SayfaController@getGuncelle'));
Route::post('/guncelle',array('as'=>'guncelle','uses'=>'SayfaController@postGuncelle'));



