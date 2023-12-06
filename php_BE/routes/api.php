<?php

use App\Http\Controllers\Api\AuthLoginController;
use App\Http\Controllers\Api\AuthRegisterController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\InforUserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthLoginController::class, 'login'])->name('login');
Route::post('/register', [AuthRegisterController::class, 'register'])->name('register');
Route::get('/checkEmail', [AuthRegisterController::class, 'checkMail'])->name('checkMail');
Route::post('/password/reset',[ResetPasswordController::class,'reset'])->name('reset');
Route::group(['middleware' => 'auth:sanctum'], function () {
    //Route::get('posts',[PostController::class,'index']);
    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);
    Route::get('listtask',[TaskController::class,'listTask']);
    // Route::delete('deltask/{id}',[TaskController::class,'destroy']);
    // Route::resource('user', UserController::class);
    Route::get('deltailuser',[UserController::class,'deltailuser']);
    Route::delete('deleteuser/{id}',[UserController::class,'destroy']);
    //search theo task
    Route::get('search',[SearchController::class,'search']); 
    Route::get('searchProject',[SearchController::class,'searchProject']); 
    // Route::resource('task1', TaskController::class)->only(['show1']); 
    // Route::get('task1', TaskController::class,'show1');
    Route::get('project1', [ProjectController::class, 'index1']);
    Route::get('project_favorites', [ProjectController::class, 'listFavorites']);
    Route::get('task/project/{id_project}', [TaskController::class, 'findByprojectId']);
    Route::post('task/update-date', [TaskController::class, 'updateDate']);
    Route::get('/projects/task-count', [TaskController::class, 'getProjectsTaskCount']);
    Route::get('/projectsfarorites/task-count', [TaskController::class, 'getProjectsTaskFavoritesCount']);
    Route::get('/projects/inbox/task-count', [TaskController::class, 'getProjectsTaskInboxCount']);
    Route::get('/projects/today/task-count', [TaskController::class, 'getProjectsTaskTodayCount']);

    
    
    Route::post('comment',[CommentsController::class,'addComment']);
    Route::get('listcomment',[CommentsController::class,'listcomment']);
    Route::get('comment/edit/{id}',[CommentsController::class,'editComment']);
    Route::put('comment/update/{id}',[CommentsController::class,'updateComment']);
    // Route::resource('comment/edit', CommentsController::class)->only(['editComment']); 
    Route::get('listdate', [TaskController::class, 'listgetdate']);

    //changeEmail
    Route::put('changeemail',[InforUserController::class,'changeEmail']);
    Route::put('changepassword',[InforUserController::class,'changePassword']);
    

    Route::delete('logout', [AuthLoginController::class, 'Logout']);
    
    
});



//trang apptoday


