<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


// TESTS
Route::get('/test/admin-user', function(){
    $user = User::where('name', 'Administrator')->get()->first();
    dd($user->name);
    return $user->name;
});