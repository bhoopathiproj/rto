<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

// User Management - Start
Route::get('/usersindex', 'AdminController@usersindex')->name('usersindex');
Route::get('/usersadd', 'AdminController@usersadd')->name('usersadd');
Route::post('/usersstore', 'AdminController@usersstore')->name('usersstore');
Route::get('/usersedit/{id}', 'AdminController@usersedit')->name('usersedit');
Route::post('/usersupdate/{id}', 'AdminController@usersupdate')->name('usersupdate');
// User Management - End

// servicetypestype Management - Start
Route::get('/servicetypes', 'AdminController@servicetypesindex')->name('servicetypesindex');
Route::get('/servicetypesadd', 'AdminController@servicetypesadd')->name('servicetypesadd');
Route::post('/servicetypesstore', 'AdminController@servicetypesstore')->name('servicetypesstore');
Route::get('/servicetypesedit/{id}', 'AdminController@servicetypesedit')->name('servicetypesedit');
Route::post('/servicetypesupdate/{id}', 'AdminController@servicetypesupdate')->name('servicetypesupdate');
Route::get('/servicetypesdelete/{id}', 'AdminController@servicetypesdelete')->name('servicetypesdelete');
// servicetypesType Management - End