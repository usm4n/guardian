<?php

Route::group([
    'prefix'=>'guardian/backend',
    'namespace'=>'Usman\Guardian\Http\Controllers',
    //'middleware' => 'auth'
    ], 
    function()
    {    
        Route::get('/',function()
        {   
            return \Redirect::to('guardian/backend/user/list');
        });
        
        Route::group(['prefix'=>'user'],function()
        {
            //get user routes.
            Route::get('/list',['as'=>'user.list','uses'=>'Users@listUser']);
            Route::get('/add',['as'=>'user.add','uses'=>'Users@addUser']);
            Route::get('/edit/{id}',['as'=>'user.edit','uses'=>'Users@editUser']);
            Route::get('/delete/{id}',['as'=>'user.delete','uses'=>'Users@deleteUser']);
           
            //post user routes
            Route::post('/create',['as'=>'user.create','uses'=>'Users@createUser']);
            Route::post('/update/{id}',['as'=>'user.update','uses'=>'Users@updateUser']);

        });

        Route::group(['prefix'=>'role'],function()
        {
            //get role routes.
            Route::get('/list',['as'=>'role.list','uses'=>'Roles@listRole']);
            Route::get('/add',['as'=>'role.add','uses'=>'Roles@addRole']);
            Route::get('/edit/{id}',['as'=>'role.edit','uses'=>'Roles@editRole']);
            Route::get('/delete/{id}',['as'=>'role.delete','uses'=>'Roles@deleteRole']);

            //post role routes.
            Route::post('/create',['as'=>'role.create','uses'=>'Roles@createRole']);
            Route::post('/update/{id}',['as'=>'role.update','uses'=>'Roles@updateRole']);

        });

        Route::group(['prefix'=>'capability'],function() 
        {   
            //get capability routes.
            Route::get('/list',['as'=>'capability.list','uses'=>'Capabilities@listCapability']);
            Route::get('/add',['as'=>'capability.add','uses'=>'Capabilities@addCapability']);
            Route::get('/edit/{id}',['as'=>'capability.edit','uses'=>'Capabilities@editCapability']);
            Route::get('/delete/{id}',['as'=>'capability.delete','uses'=>'Capabilities@deleteCapability']);

            //post routes.
            Route::post('/create',['as'=>'capability.create','uses'=>'Capabilities@createCapability']);
            Route::post('/update/{id}',['as'=>'capability.update','uses'=>'Capabilities@updateCapability']);

        });
});

