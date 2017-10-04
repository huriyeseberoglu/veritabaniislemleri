<?php


Route::get('/',array('as'=>'index','uses'=>'SayfaController@getIndex'));
Route::post('/kaydet',array('as'=>'kaydet','uses'=>'SayfaController@postKaydet'));
Route::get('/sil/{id?}',array('as'=>'sil','uses'=>'SayfaController@getSil'));



