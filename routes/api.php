<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/skills', ['uses' => 'SkillController@index', 'as' => 'index_skill']);
Route::get('/skill-cards', ['uses' => 'SkillCardsController@index', 'as' => 'index_skill_cards']);
Route::get('/current-skill/{id}', ['uses' => 'SkillController@show', 'as' => 'jessie_card']);
Route::get('/about', ['uses' => 'AboutController@index', 'as' => 'about_deamon']);
Route::get('/menu-features', ['uses' => 'MenuFeatureController@index', 'as' => 'menu_deamon']);
Route::get('/todos', ['uses' => 'MenuTodoController@index', 'as' => 'todo_devil']);

Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('/register', 'ApiController\Auth\RegisterController@register');
    Route::post('/login', 'ApiController\Auth\LoginController@login');
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/nuxt', 'ApiController\NuxtController@index');
    Route::get('/auth/logout', 'ApiController\NuxtController@logout');
});

Route::post('/send', 'ApiController\SendCVData@send');
