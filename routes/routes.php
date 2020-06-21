<?php

return [
    "GET/" => 'App\Controllers\HomeController@home',
    "GET/test" => 'App\Controllers\HomeController@test',
    "GET/admin" => 'App\Controllers\UserController@admin',
    "POST/task" => 'App\Controllers\HomeController@addTask',
    "GET/admin/sing-in" => 'App\Controllers\UserController@adminSingInPage',
    "POST/admin/sing-in" => 'App\Controllers\UserController@adminSingIn',
    "GET/admin/editor" => 'App\Controllers\UserController@editor',
    "GET/admin/edit-form" => 'App\Controllers\UserController@editForm',
    "POST/admin/edit-task" => 'App\Controllers\UserController@editTask'
];