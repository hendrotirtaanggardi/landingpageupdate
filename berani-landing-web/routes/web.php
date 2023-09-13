<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FrameworkLibraryController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\MainContentController;
use App\Http\Controllers\ContentController;
use App\Models\MainContent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'welcome', ['tabTitle' => 'Berani Digital Talent Platform'])->name('/');

Route::get('/', function () {
    return view('welcome', [
        'content' => MainContent::where('content_id', 2)->first(),
        'tabTitle' => 'Berani Digital Talent Platform'
    ]);
})->name('/');

// Route::get('/', [LandingController::class], 'index')->name('/');

Route::redirect('/home', '/');

Auth::routes();

Route::group(['middleware' => ['auth', 'revalidate', 'role:talent']], function () {
    Route::get('/talent', [TalentController::class, 'index'])->name('talent');
});

Route::group(['middleware' => ['auth', 'revalidate', 'role:recruiter']], function () {
    Route::get('/recruiter', [RecruiterController::class, 'index'])->name('recruiter');

    Route::get('/talent/{user}', [TalentController::class, 'show'])->name('talent.detail');

    Route::get('/programming-languages', [ProgrammingLanguageController::class, 'index'])->name('programming-languages');
    Route::get('/framework-libraries', [FrameworkLibraryController::class, 'index'])->name('framework-libraries');
    Route::get('/tools', [ToolController::class, 'index'])->name('tools');
    Route::get('/files', [FileController::class, 'index'])->name('files');

    Route::resource('maincontents', MainContentController::class);
    Route::resource('contents', ContentController::class);
});

Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.google.callback');
