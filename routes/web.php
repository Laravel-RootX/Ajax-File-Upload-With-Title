<?php



Route::get('ajaxImageUpload', 'AjaxImageUploadController@ajaxImageUpload');
Route::post('ajaxImageUpload', 'AjaxImageUploadController@ajaxImageUploadPost')->name('ajaxImageUpload');