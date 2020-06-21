<?php

return [
    "GET/" => 'App\Controllers\HomeController@home',
    "GET/test" => 'App\Controllers\HomeController@test',
    "GET/admin" => 'App\Controllers\UserController@admin',
    "POST/task" => 'App\Controllers\HomeController@addTask',//adminSingIn
    "GET/admin/sing-in" => 'App\Controllers\UserController@adminSingIn'
];