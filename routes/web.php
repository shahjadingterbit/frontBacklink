<?php

use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BacklinkController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CmsDomainController;
use App\Http\Controllers\DomainAssignedGroup;
use App\Http\Controllers\BacklinkAssignedGroup;
use App\Http\Controllers\UserAssignedDomain;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);
    }
});

Route::post('userlogin', [LoginController::class, 'userlogin'])->name('userlogin');
Route::get('/login', [LoginController::class, 'create'])->name('create');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('checksession')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('users/domains/{userId}', [UserAssignedDomain::class, 'index'])->name('userDomainList');
    Route::get('users/domains/assign/{userId}', [UserAssignedDomain::class, 'assign'])->name('assignDomain');
    Route::post('users/domains/addAndUpdateDomain', [UserAssignedDomain::class, 'addAndUpdateDomain'])->name('addAndUpdateDomain');

    Route::resource('domains', CmsDomainController::class);
    Route::get('domains/groups/{domainId}', [DomainAssignedGroup::class, 'index'])->name('domainGroupList');
    Route::get('domains/groups/assign/{domainId}', [DomainAssignedGroup::class, 'assign'])->name('assignGroup');
    Route::post('domains/groups/addAndUpdate', [DomainAssignedGroup::class, 'addAndUpdate'])->name('addAndUpdateGroup');
    Route::resource('groups', GroupController::class);
    Route::resource('backlinks', BacklinkController::class);
    Route::get('groups/backlinks/{id}', [BacklinkAssignedGroup::class, 'index'])->name('groups.backlinks.index');
    Route::get('groups/backlinks/assign/{groupId}', [BacklinkAssignedGroup::class, 'assign'])->name('assignBacklink');
    Route::post('groups/backlinks/addAndUpdate', [BacklinkAssignedGroup::class, 'addAndUpdate'])->name('addAndUpdateBacklink');
});


