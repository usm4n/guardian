<?php

$namespace = 'Usman\Guardian\Controllers\\';

Route::group(['prefix'=>'guardian/backend'],function() use ($namespace)
{
    
    Route::get('/',function()
    {   
        return \Redirect::to('guardian/backend/user/list');
    });
    
    Route::group(['prefix'=>'user'],function() use ($namespace) {
        
        //get user routes.
        Route::get('/list',['as'=>'user.list','uses'=>$namespace.'Users@listUser']);
        Route::get('/add',['as'=>'user.add','uses'=>$namespace.'Users@addUser']);
        Route::get('/edit/{id}',['as'=>'user.edit','uses'=>$namespace.'Users@editUser']);
        Route::get('/delete/{id}',['as'=>'user.delete','uses'=>$namespace.'Users@deleteUser']);
       
        //post user routes
        Route::post('/create',['as'=>'user.create','uses'=>$namespace.'Users@createUser']);
        Route::post('/update/{id}',['as'=>'user.update','uses'=>$namespace.'Users@updateUser']);

    });

    Route::group(['prefix'=>'role'],function() use ($namespace) {
        
        //get role routes.
        Route::get('/list',['as'=>'role.list','uses'=>$namespace.'Roles@listRole']);
        Route::get('/add',['as'=>'role.add','uses'=>$namespace.'Roles@addRole']);
        Route::get('/edit/{id}',['as'=>'role.edit','uses'=>$namespace.'Roles@editRole']);
        Route::get('/delete/{id}',['as'=>'role.delete','uses'=>$namespace.'Roles@deleteRole']);

        //post role routes.
        Route::post('/create',['as'=>'role.create','uses'=>$namespace.'Roles@createRole']);
        Route::post('/update/{id}',['as'=>'role.update','uses'=>$namespace.'Roles@updateRole']);

    });

    Route::group(['prefix'=>'capability'],function() use ($namespace) {
        
        //get capability routes.
        Route::get('/list',['as'=>'capability.list','uses'=>$namespace.'Capabilities@listCapability']);
        Route::get('/add',['as'=>'capability.add','uses'=>$namespace.'Capabilities@addCapability']);
        Route::get('/edit/{id}',['as'=>'capability.edit','uses'=>$namespace.'Capabilities@editCapability']);
        Route::get('/delete/{id}',['as'=>'capability.delete','uses'=>$namespace.'Capabilities@deleteCapability']);

        //post routes.
        Route::post('/craete',['as'=>'capability.create','uses'=>$namespace.'Capabilities@createCapability']);
        Route::post('/update/{id}',['as'=>'capability.update','uses'=>$namespace.'Capabilities@updateCapability']);

    });

});
