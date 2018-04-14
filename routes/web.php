<?php

use App\User;

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
  $users = User::all();
  return view('home', ['message' => 'Hello Lumen!', 'users' => $users]);
});

$router->post('/users', function (Illuminate\Http\Request $request) use ($router) {
  $username = $request->input('username');
  $user = User::create(['username' => $username]);
  return redirect('/');
});

$router->delete('/users/{id}', function ($id) use ($router) {
  $user = User::find($id);
  $user->delete();
  return redirect('/');
});
