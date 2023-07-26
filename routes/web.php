<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    //$exitCode = Artisan::call('config:clear');
    //$exitCode = Artisan::call('cache:clear');
    //$exitCode = Artisan::call('config:cache');
    return 'DONE';
});

Route::get('/', [App\Http\Controllers\Web\WebController::class, 'index'])->name('index');
Route::get('wizard/', [App\Http\Controllers\Web\WebController::class, 'wizard'])->name('wizard');
Route::post('wizard/results/', [App\Http\Controllers\Web\WebController::class, 'wizardpost'])->name('wizard.post');
Route::get('wizard/results/', function () {
    return redirect('wizard/');
});
Route::get('episodios', [App\Http\Controllers\Web\WebController::class, 'episodes'])->name('episodes');
Route::post('episodios/login', [App\Http\Controllers\Web\WebController::class, 'episodeloginsave'])->name('episode.loginsave');
Route::get('episodio/{category}/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'episode'])->name('episode');
Route::get('soluciones', [App\Http\Controllers\Web\WebController::class, 'solutions'])->name('solutions');
Route::get('solucion/{category}/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'solution'])->name('solution');
Route::get('solucion/{id}/download', [App\Http\Controllers\Web\WebController::class, 'solutiondownload'])->name('download');
Route::post('solucion/postback', [App\Http\Controllers\Web\WebController::class, 'postback'])->name('solution.postback');
Route::get('contacto', [App\Http\Controllers\Web\WebController::class, 'contact'])->name('contact');
Route::post('contacto/send', [App\Http\Controllers\Web\WebController::class, 'contactSave'])->name('contact.save');
Route::get('contacto/thanks', [App\Http\Controllers\Web\WebController::class, 'contactThanks'])->name('contact.thanks');
Route::get('noticias', [App\Http\Controllers\Web\WebController::class, 'posts'])->name('posts');
Route::get('noticia/{category}/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'post'])->name('post');
Route::post('postForm', [App\Http\Controllers\Web\WebController::class, 'postForm'])->name('post.form');
Route::get('gracias/{id}', [App\Http\Controllers\Web\WebController::class, 'thanks'])->name('thanks');


Route::get('newsletter', [App\Http\Controllers\Web\WebController::class, 'newsletter'])->name('newsletter');
Route::post('newsletter/send', [App\Http\Controllers\Web\WebController::class, 'newsletterSave'])->name('newsletter.save');
Route::get('newsletter/thanks', [App\Http\Controllers\Web\WebController::class, 'newsletterThanks'])->name('newsletter.thanks');

Route::get('locale/{id}', [App\Http\Controllers\Web\WebController::class, 'changeLanguage'])->name('changeLanguage');

/****** File Manager ******/

/*Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});*/

Route::get("storage-link", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});