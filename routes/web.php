<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// principal landing page
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/pricing', function () {
    return view('frontend.pricing');
})->name('pricing');

Auth::routes(); //auth routes default


// guest routes
Route::group(['middleware' => 'guest'], function () {
    
    Route::get('/sign-in/github',[LoginController::class,'github']);

    Route::get('/sign-in/github/redirect',[LoginController::class,'githubRedirect']);
   
});

// auth routes 
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard/repositories', [App\Http\Controllers\HomeController::class, 'repositoriesList'])->name('repo.list');

Route::get('/dashboard/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');


Route::post('/upload/project', [App\Http\Controllers\HomeController::class, 'uploadProject'])->name('upload.project');
Route::post('/session/clear', [App\Http\Controllers\HomeController::class, 'sessionClear'])->name('session.clear');

Route::post('/get/projects', [App\Http\Controllers\HomeController::class, 'getProjects'])->name('get.projects');

Route::post('/git/deploy', [App\Http\Controllers\HomeController::class, 'gitDeploy'])->name('git.deploy');

Route::get('/project/config/{id}', [App\Http\Controllers\HomeController::class, 'projectConfig'])->name('project.config');

Route::post('/project/update', [App\Http\Controllers\HomeController::class, 'projectUpdate'])->name('project.update');

Route::delete('/project/delete/{id}', [App\Http\Controllers\HomeController::class, 'projectDelete'])->name('project.delete');



Route::get('/profile', [App\Http\Controllers\HomeController::class, 'showProfile'])->name('profile');









// Route::domain('{account}.'.env('SESSION_DOMAIN'))->group(function () {
//     Route::get('/', function ($account) {
         
//          return view('interior-consultant.index');
//     });
// });