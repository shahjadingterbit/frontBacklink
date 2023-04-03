<?php

use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BacklinkController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CmsDomainController;
use App\Http\Controllers\DomainAssignedGroup;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();
// echo "<pre>";print_r($menu);die;
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);
    }
});

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::resource('domains', CmsDomainController::class);
Route::get('domains/groups/{domainId}', [DomainAssignedGroup::class, 'index'])->name('domainGroupList');
Route::get('domains/groups/assign/{domainId}', [DomainAssignedGroup::class, 'assign'])->name('assignGroup');
Route::post('domains/groups/addAndUpdate', [DomainAssignedGroup::class, 'addAndUpdate'])->name('addAndUpdateGroup');
Route::resource('groups', GroupController::class);
Route::resource('backlinks', BacklinkController::class);
Route::get('groups/backlinks/{id}', [BacklinkAssignedGroup::class, 'index'])->name('groups.backlinks.index');
Route::get('groups/backlinks/assign/{groupId}', [BacklinkAssignedGroup::class, 'assign'])->name('assignBacklink');
Route::post('groups/backlinks/addAndUpdate', [BacklinkAssignedGroup::class, 'addAndUpdate'])->name('addAndUpdateBacklink');

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
