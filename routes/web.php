<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\BacklinkController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\HeadingRecordController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectLogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAnalyticsController;
use App\Http\Controllers\GoogleSearchConsoleController;
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

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

// Account pages
Route::prefix('account')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
    Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
});

// Logs pages
Route::prefix('log')->name('log.')->group(function () {
    Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
    Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
});

Route::put('users/email', [UsersController::class, 'changeEmail'])->name('users.changeEmail');
Route::put('users/password', [UsersController::class, 'changePassword'])->name('users.changePassword');
Route::resource('users', UsersController::class);
Route::get('/roles/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::get('/exportAllDomains', [DomainController::class, 'exportAllDomains'])->name('exportAllDomains');
Route::get('/exportDomain', [DomainController::class, 'exportDomain'])->name('exportDomain');

Route::resource('groups', GroupController::class);
Route::resource('backlinks', BacklinkController::class);

Route::resource('locations', LocationController::class);
Route::resource('headings', HeadingController::class);
Route::resource('heading_records', HeadingRecordController::class);
Route::post('project_logs/addAndUpdate', [ProjectLogController::class, 'addAndUpdate'])->name('project_logs.addAndUpdate');
Route::get('domains/project_logs/addGroupInformation', [ProjectLogController::class, 'addGroupInformation']);
Route::get('domains/project_logs/getKeywordInformation', [ProjectLogController::class, 'getKeywordInformation']);
Route::get('domains/project_logs/show', [ProjectLogController::class, 'show'])->name('domains.project_logs.show');
Route::resource('project_logs', ProjectLogController::class);
Route::get('autocomplete/{id}', [AutoCompleteController::class, 'autocomplete'])->name('autocomplete');
Route::get('googleAnalytics', [GoogleAnalyticsController::class, 'index']);
Route::get('googleSearchConsole', [GoogleSearchConsoleController::class, 'index']);



/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
