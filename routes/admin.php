<?php

use App\Http\Controllers\Admin\Localecontroller;
use App\Http\Controllers\Admin\Localetagcontroller;
use Illuminate\Support\Facades\Route;

Route::post('loginpost', [App\Http\Controllers\Admin\LoginController::class, 'indexPost'])->name('login.post');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('login.logout');
Route::get('loginall', [App\Http\Controllers\Admin\LoginController::class, 'indexall'])->name('login.all');
Route::resource('login', App\Http\Controllers\Admin\LoginController::class);
Route::prefix('/admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin');
    Route::get('pagefields/home/{id}', [App\Http\Controllers\Admin\PageFieldController::class, 'home'])->name('pagefields.home');
    Route::get('pagefields/social', [App\Http\Controllers\Admin\PageFieldController::class, 'social'])->name('pagefields.social');
    Route::get('pagefields/files/{id}', [App\Http\Controllers\Admin\PageFieldController::class, 'files'])->name('pagefields.files');
    Route::get('pagefields/logos', [App\Http\Controllers\Admin\PageFieldController::class, 'logos'])->name('pagefields.logos');
    Route::get('pagefields/wizard', [App\Http\Controllers\Admin\PageFieldController::class, 'wizard'])->name('pagefields.wizard');
    Route::get('pagefields/wizard_result', [App\Http\Controllers\Admin\PageFieldController::class, 'wizard_result'])->name('pagefields.wizard_result');
    Route::get('pagefields/tooltip', [App\Http\Controllers\Admin\PageFieldController::class, 'tooltip'])->name('pagefields.tooltip');
    Route::resource('pagefields', App\Http\Controllers\Admin\PageFieldController::class)->only(['update']);
    Route::get('users/permission/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'permissions'])->name('users.permission');
    Route::put('users/permission/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'updatePermission'])->name('users.permission.update');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('home_sliders', App\Http\Controllers\Admin\HomeSliderController::class);
    Route::resource('solution_sliders', App\Http\Controllers\Admin\SolutionSliderController::class);
    Route::resource('episode_sliders', App\Http\Controllers\Admin\EpisodeSliderController::class);
    Route::resource('post_sliders', App\Http\Controllers\Admin\PostSliderController::class);
    Route::resource('category_solutions', App\Http\Controllers\Admin\CategorySolutionController::class);
    Route::resource('item_solutions', App\Http\Controllers\Admin\ItemSolutionController::class);
    Route::resource('category_episodes', App\Http\Controllers\Admin\CategoryEpisodeController::class);
    Route::resource('item_episodes', App\Http\Controllers\Admin\ItemEpisodeController::class);
    Route::resource('category_posts', App\Http\Controllers\Admin\CategoryPostController::class);
    Route::resource('item_posts', App\Http\Controllers\Admin\ItemPostController::class);
    Route::resource('speakers', App\Http\Controllers\Admin\SpeakerController::class);

    Route::get('locale', [Localecontroller::class, 'index'])->name("panel.locale");
    Route::get('locale/{id}', [Localecontroller::class, 'edit'])->name("panel.locale.view");
    Route::get('localetag/regenerate', [Localetagcontroller::class, 'regenerate'])->name("panel.localetag.regenerate");
    Route::match (['get', 'post'], 'translate/{id}/translate', [Localetagcontroller::class, 'translate'])->name("panel.localetag.translate");

    Route::get('localetag', [Localetagcontroller::class, 'index'])->name("panel.localetag");
    Route::match (['get', 'post'], 'localetag/add/', [Localetagcontroller::class, 'add'])->name("panel.localetag.add");
    Route::get('localetag/{id}/', [Localetagcontroller::class, 'details'])->name("panel.localetag.details");
    Route::match (['get', 'post'], 'translate/{id}/translate', [Localetagcontroller::class, 'translate'])->name("panel.localetag.translate");

    Route::match (['get', 'post'], 'locale/add/', [Localetagcontroller::class, 'add'])->name("panel.locale.add");
    Route::get('locale/{id}/', [Localecontroller::class, 'details'])->name("panel.locale.details");
    Route::match (['get', 'post'], 'locale/{id}/edit', [Localecontroller::class, 'edit'])->name("panel.locale.edit");
    Route::post('locale/{id}/delete', [Localecontroller::class, 'delete'])->name("panel.locale.delete");

    Route::resource('records', App\Http\Controllers\Admin\RecordController::class)->only(['index']);

});
