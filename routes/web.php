<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('getLogin');
// Route::get('/', function () {
//     return view('frontend.home');
// })->name('getLogin');

Route::get('/',[FrontendController::class, 'index'])->name('FrontHome');
Route::get('/login', function () {
    return view('auth.login');
})->name('getLogin');
Route::get('/About-us',[FrontendController::class, 'about'])->name('about');
Route::get('/Contact-us',[FrontendController::class, 'contact'])->name('contact');
Route::get('/news',[FrontendController::class, 'gallery'])->name('gallery');

Route::get('/blank-page', [Homecontroller::class, 'blank'])->name('#');
Auth::routes();

Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/home/bureau_structure',[HomeController::class, 'bureau_structure'])->name('bureau_structure');
Route::get('/home/job_title',[HomeController::class, 'job_title'])->name('job_title');
Route::get('/home/role',[HomeController::class, 'role'])->name('role');
Route::get('/markasread/{id}',[HomeController::class, 'markasread'])->name('markasread');

Route::get('/HR/personal_information',[EmployeeController::class,'index'])->name('personal_information');

Route::get('/home/users/create', [EmployeeController::class, 'create'])->name('createEmp');
Route::post('/home/users/store', [EmployeeController::class, 'store'])->name('SaveEmployee');

Route::post('dynamic_dependent/fetch',[HomeController::class, 'fetch'])->name('dynamicdependent.fetch');
Route::get('/home/users/edit/{id}', [EmployeeController::class, 'edit'])->name('editEmp');
Route::patch('/home/users/update/{id}', [EmployeeController::class, 'update'])->name('updateEmp');
Route::get('/home/users/view/{id}', [EmployeeController::class, 'show'])->name('viewEmp');

// Route::patch('/home/users/updatePassword', [EmployeeController::class, 'updatePassword'])->name('updatePassword');
Route::delete('/home/users/delete/{id}', [EmployeeController::class,'destroy'])->name('DelEmp');

// ---------------------------Role user permission--------------------------------------------
Route::get('/permission',[PermissionController::class, 'index'])->name('permissions.index');
// Route::resource('permissions','PermissionController');
// Route::resource('roles',RoleController::class);
Route::get('/role',[RoleController::class, 'index'])->name('roles.index');
Route::get('/role/create',[RoleController::class, 'create'])->name('roles.create');
Route::post('/role/store',[RoleController::class, 'store'])->name('roles.store');
Route::get('/role/edit/{role}',[RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/role/update/{role}',[RoleController::class, 'update'])->name('roles.update');
Route::delete('/role/delete/{role}',[RoleController::class, 'destroy'])->name('roles.delete');

Route::get('/home/users/', [UserController::class, 'index'])->name('users');
Route::get('/home/users/role/{user}', [UserController::class, 'edit'])->name('role.give');
Route::patch('/home/users/role/add/{user}', [UserController::class, 'update'])->name('user.role');
Route::get('/home/users/role/decline/{user}', [UserController::class, 'declineRole'])->name('decline.role');

// ---------------------------</Role user permission------------------------------------------
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/home/HR/dependent', [HrController::class, 'dependents'])->name('dependents');
// Route::delete('/home/HR/dependent/delete/{id}', [HrController::class, 'dep_delete'])->name('dep_delete');
Route::get('/home/HR/emergency', [HrController::class, 'emergency'])->name('emergency');
Route::get('/home/HR/experience', [HrController::class, 'expereince'])->name('expereince');
Route::get('/home/HR/education', [HrController::class, 'education'])->name('education');
Route::get('/home/HR/are_corateral', [HrController::class, 'are_colateral'])->name('are_colateral');
Route::get('/home/HR/have_colateral', [HrController::class, 'have_colateral'])->name('have_colateral');
Route::get('/employee/profile', [HomeController::class, 'viewProfile'])->name('viewProfile');

// ////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/home/settings/AccountSettings', [AccountController::class, 'index'])->name('settings.index');
Route::patch('/home/settings/AccountSettings/UpdatePassword', [AccountController::class, 'updatePassword'])->name('updatePassword');

Route::get('/home/Property/register', [EquipmentController::class, 'index'])->name('register.index');
Route::get('/home/Property/Request/limitedItem', [EquipmentController::class, 'limitedItem'])->name('limitedItem.index');
Route::get('/home/Property/Request/permanentItem', [EquipmentController::class, 'permanentItem'])->name('permanentItem.index');
Route::get('/home/Property/create', [EquipmentController::class, 'create'])->name('createItem');
Route::post('/home/property/store', [EquipmentController::class, 'store'])->name('SaveItem');

Route::post('/home/property/perma-Requested/{id}', [EquipmentController::class, 'req_store'])->name('req_store');
Route::get('/home/Property/my_items/requested', [EquipmentController::class, 'requested_items'])->name('requested_items');
Route::get('/home/Property/my_items/received', [EquipmentController::class, 'received_items'])->name('received_items');
Route::get('/home/Property/store_manager/lim_requested', [EquipmentController::class, 'managerRequested_lim_item'])->name('manager_requested_lim');
Route::get('/home/Property/store_manager/per_requested', [EquipmentController::class, 'managerRequested_per_item'])->name('manager_requested_per');
// limited accept and decline
Route::get('/home/Property/store_manager/lim_accept/{id}', [EquipmentController::class, 'accept_request'])->name('accepet_request_lim');
Route::get('/home/Property/store_manager/lim_decline/{id}', [EquipmentController::class, 'decline_request'])->name('decline_request_lim');
// permanent accept and decline
Route::get('/home/Property/store_manager/per_accept/{id}', [EquipmentController::class, 'accept_request_per'])->name('accepet_request_per');
Route::get('/home/Property/store_manager/per_decline/{id}', [EquipmentController::class, 'decline_request_per'])->name('decline_request_per');
Route::get('/home/Property/property_admin/approved_lim_requests', [EquipmentController::class, 'approved_lim_requests'])->name('approved_lim_requests');
Route::get('/home/Property/property_admin/approved_per_requests', [EquipmentController::class, 'approved_per_requests'])->name('approved_per_requests');
// Route::get('/home/Property/property_admin/give_item/{id}', [EquipmentController::class, 'giveItem'])->name('give.item');
Route::get('/home/Property/property_admin/give_lim_item/{req_id}/{item_id}', [EquipmentController::class, 'give_lim_Item'])->name('give_lim_item');
Route::get('/home/Property/property_admin/give_per_item/{req_id}/{item_id}', [EquipmentController::class, 'give_per_Item'])->name('give_per_item');
Route::get('/home/Property/property_admin/return_per_item/{req_id}/{item_id}', [EquipmentController::class, 'return_per_item'])->name('return_per_item');
Route::get('/home/property/edit/{id}', [EquipmentController::class, 'edit'])->name('editItem');
Route::patch('/home/property/update/{id}', [EquipmentController::class, 'update'])->name('updateItem');
Route::get('/home/property/view/{id}', [EquipmentController::class, 'show'])->name('viewItem');
Route::delete('/home/property/delete/{id}', [EquipmentController::class,'destroy'])->name('delItem');
// post controller
Route::get('/home/posts/create', [PostController::class, 'index'])->name('create-post');
Route::post('/home/posts/save', [PostController::class, 'store'])->name('savePost');
Route::get('/home/posts/all', [PostController::class, 'view'])->name('view-post');
Route::get('/home/posts/{id}', [PostController::class, 'show'])->name('showpost');
Route::get('/home/posts/edit/{id}', [PostController::class, 'edit'])->name('editpost');
Route::patch('/home/posts/update/{id}', [PostController::class, 'update'])->name('updatepost');
Route::delete('/home/posts/delete/{id}', [PostController::class, 'destroy'])->name('deletepost');