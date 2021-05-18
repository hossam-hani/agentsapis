<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\keypersonsController;
use App\Http\Controllers\FamilymembersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;



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


// teams
Route::get('/teams', [TeamsController::class, 'get']);
Route::post('/teams', [TeamsController::class, 'create']);
Route::post('/teams/{id}', [TeamsController::class, 'update']);


// agents
Route::get('/agents', [AgentsController::class, 'get']);
Route::post('/agents', [AgentsController::class, 'create']);
Route::post('/agents/{id}', [AgentsController::class, 'update']);


// keypersons
Route::get('/keypersons', [keypersonsController::class, 'get']);
Route::post('/keypersons', [keypersonsController::class, 'create']);
Route::post('/keypersons/{id}', [keypersonsController::class, 'update']);


// familymembers
Route::get('/familymembers', [FamilymembersController::class, 'get']);
Route::post('/familymembers', [FamilymembersController::class, 'create']);
Route::post('/familymembers/{id}', [FamilymembersController::class, 'update']);


// images
Route::get('/images', [ImagesController::class, 'get']);
Route::post('/images', [ImagesController::class, 'create']);
Route::post('/images/{id}', [ImagesController::class, 'update']);

// links
Route::get('/links', [LinksController::class, 'get']);
Route::post('/links', [LinksController::class, 'create']);
Route::post('/links/{id}', [LinksController::class, 'update']);


//players
Route::get('/players', [PlayersController::class, 'get']);
Route::post('/players', [PlayersController::class, 'create']);
Route::post('/players/{id}', [PlayersController::class, 'update']);

// posts
Route::get('/posts', [PostsController::class, 'get']);
Route::post('/posts', [PostsController::class, 'create']);
Route::post('/posts/{id}', [PostsController::class, 'update']);

//users
Route::post('/users/login', [UsersController::class, 'login']);
Route::post('/users/register', [UsersController::class, 'register']);
Route::middleware('auth:api')->get('/users/notifications', [UsersController::class, 'get_notifications']);
Route::middleware('auth:api')->post('/users/notificationtoken', [UsersController::class, 'save_notification_token']);




