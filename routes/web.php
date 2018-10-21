<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Param wajib
$router->get('key/{jum}', function($jum){
    return str_random($jum);
});

// Param Optional
$router->get('hallo[/{name}]', function($name = 'User'){
    return "Hallo ". $name;
});

// Pakai Controller
$router->get('keygen/{jum}', 'generalController@keyGen');

// Post Controller
$router->post('hi', 'generalController@hiGan');

// Redirect
$router->get('profile', function(){
    return redirect()->route('alias');
});

// Alias
$router->get('profile/detail', ['as' => 'alias', function() {
    return "Profile Saya";
}]);

// Group
$router->group(['prefix' => 'user'], function() use ($router){
    $router->get('lists', function(){
        return "Ini List User";
    });

    $router->get('detail', function(){
        return "Ini Detail User";
    });
});

// Group & Middleware
$router->group(['prefix' => 'admin'], function() use ($router){
    
    // Home Page
    $router->get('home', function(){
        return "Ini Home Admin";
    });

    // User Manager
    $router->group(['prefix' => 'user', 'middleware'=>'age:17,20'], function() use ($router){
        $router->get('lists', function(){
            return "Ini Detail User";
        });
    });
});


