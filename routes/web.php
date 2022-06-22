<?php

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
//     return view('welcome');
// });

Auth::routes();

// Authentication Routes...
Route::get('/', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\Auth\LoginController@showLoginForm'
]);

Route::post('/', [
    'as' => '',
    'uses' => 'App\Http\Controllers\Auth\LoginController@login'
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout'
  ]);
  
  // Password Reset Routes...
  Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'App\Http\Controllers\Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm'
  ]);
  
  // Registration Routes...
  Route::get('register', [
    'as' => 'register',
    'uses' => 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm'
  ]);
  Route::post('register', [
    'as' => '',
    'uses' => 'App\Http\Controllers\Auth\RegisterController@register'
  ]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
  
Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);

    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/users', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('users');
    Route::get('/add-users', [App\Http\Controllers\Backend\UserController::class, 'create'])->name('addUser');
    Route::post('/store-users', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('storeUser');
    Route::get('/users/edit/{id}', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('editUser');
    Route::post('/users/update/{id}', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('updateUser');
    //Route::get('/users/{slug}', [App\Http\Controllers\Backend\UserController::class, 'show'])->name('viewUser');
    Route::delete('/delete-users/{id}', [App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('deleteUser');
    
    Route::get('/users/role', [App\Http\Controllers\Backend\RoleController::class, 'index'])->name('usersRole');
    Route::get('/users/role/add', [App\Http\Controllers\Backend\RoleController::class, 'create'])->name('addUserRole');
    Route::post('/users/role/store', [App\Http\Controllers\Backend\RoleController::class, 'store'])->name('storeUserRole');
    Route::get('/users/role/edit/{id}', [App\Http\Controllers\Backend\RoleController::class, 'edit'])->name('editUserRole');
    Route::post('/users/role/update/{id}', [App\Http\Controllers\Backend\RoleController::class, 'update'])->name('updateUserRole');
    Route::delete('/users/role/delete/{id}', [App\Http\Controllers\Backend\RoleController::class, 'destroy'])->name('deleteUserRole');

    Route::get('/permissions', [App\Http\Controllers\Backend\PermissionsController::class, 'index'])->name('permissions');
    Route::get('/permissions/add', [App\Http\Controllers\Backend\PermissionsController::class, 'create'])->name('addpermission');
    Route::post('/permissions/store', [App\Http\Controllers\Backend\PermissionsController::class, 'store'])->name('storepermission');
    Route::get('/permissions/edit/{id}', [App\Http\Controllers\Backend\PermissionsController::class, 'edit'])->name('editpermission');
    Route::post('/permissions/update/{id}', [App\Http\Controllers\Backend\PermissionsController::class, 'update'])->name('updatePermission');
    Route::delete('/permissions/delete/{id}', [App\Http\Controllers\Backend\PermissionsController::class, 'destroy'])->name('deletepermission');
    
    Route::get('/projects', [App\Http\Controllers\Backend\ProjectController::class, 'index'])->name('projects');
    Route::get('/add-projects', [App\Http\Controllers\Backend\ProjectController::class, 'create'])->name('addProject');
    Route::post('/store-projects', [App\Http\Controllers\Backend\ProjectController::class, 'store'])->name('storeProject');
    Route::get('/projects/edit/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'edit'])->name('editProject');
    Route::post('/projects/update/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'update'])->name('updateProject');
    Route::get('/projects/{slug}', [App\Http\Controllers\Backend\ProjectController::class, 'show'])->name('viewProject');
    Route::delete('/delete-projects/{id}', [App\Http\Controllers\Backend\ProjectController::class, 'destroy'])->name('deleteProject');
    
    Route::get('/tags', [App\Http\Controllers\Backend\TagController::class, 'index'])->name('tags');
    Route::get('/add-tags', [App\Http\Controllers\Backend\TagController::class, 'create'])->name('addTag');
    Route::post('/store-tags', [App\Http\Controllers\Backend\TagController::class, 'store'])->name('storeTag');
    Route::post('/tags/edit', [App\Http\Controllers\Backend\TagController::class, 'edit'])->name('editTag');
    Route::post('/tags/update', [App\Http\Controllers\Backend\TagController::class, 'update'])->name('updateTag');
    Route::get('/tags/{slug}', [App\Http\Controllers\Backend\TagController::class, 'show'])->name('viewTag');
    Route::delete('/delete-tags/{id}', [App\Http\Controllers\Backend\TagController::class, 'destroy'])->name('deleteTag');
    
    Route::post('/store-review', [App\Http\Controllers\Backend\ReviewController::class, 'store'])->name('storeReview');
});