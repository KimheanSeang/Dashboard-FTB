<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\assessment\AssessmentController;
use App\Http\Controllers\Backend\ChatController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\chat\AddChatController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\doc\DocumentController;
use App\Http\Controllers\doc\ReadErrorController;
use App\Http\Controllers\doc\RecoverController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/*|-------------------------------------Route When open first page-------------------------------------|*/

Route::get('/', function () {
    return view('auth.login');
});



/*|-------------------------------------Admin Dashboard-------------------------------------|*/
Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('admin/dashboard');


/*|-------------------------------------Profile User-------------------------------------|*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/*|-------------------------------------Admin when login-------------------------------------|*/
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');



/*|-------------------------------------Group of Controller role admin-------------------------------------|*/
Route::middleware(['auth', 'roles:admin'])->group(function () {



    /*|-------------------------------------Admin Route-------------------------------------|*/
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');



    /*|-------------------------------------Property create route-------------------------------------|*/
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });




    /*|-------------------------------------Permission-------------------------------------|*/
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('export', 'Export')->name('export');
        Route::post('import', 'Import')->name('import');
    });




    /*|-------------------------------------Role and add permission to role routes-------------------------------------|*/
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    });




    /*|-------------------------------------User Route-------------------------------------|*/
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });




    /*|-------------------------------------Document Route-------------------------------------|*/
    Route::controller(DocumentController::class)->group(function () {

        Route::get('/show/doc/{id}', 'ShowDoc')->name('show.doc');
        Route::get('/all/doc', 'AllDoc')->name('all.doc');
        Route::get('/add/doc', 'AddDoc')->name('add.doc');
        Route::post('/add/doc', 'store')->name('store.doc');
        Route::get('/all/report', 'AllReport')->name('all.report');
        Route::get('/edit/doc/{id}', 'EditDoc')->name('edit.doc');
        Route::post('/update/doc/{id}', 'UpdateDoc')->name('update.doc');
        Route::get('/delete/doc/{id}', 'DeleteDoc')->name('delete.doc');

        Route::get('/view/doc/{id}', 'viewFile')->name('view.doc');
    });




    /*|-------------------------------------File report Route-------------------------------------|*/
    Route::controller(RecoverController::class)->group(function () {
        Route::get('/delete/recover/{id}', 'DeleteRecover')->name('delete.recover');
        Route::get('/backup/recover/{id}', 'BackupRecover')->name('backup.recover');
    });



    /*|-------------------------------------Chatbot route-------------------------------------|*/
    Route::controller(AddChatController::class)->group(function () {

        Route::get('/edit/knowledge/{id}', 'EditKnowledge')->name('edit.chatbot');
        Route::post('/update/knowledge/{id}', 'UpdateKnowledge')->name('update.chatbot');
        Route::get('/delete/knowledge/{id}', 'DeleteKnowledge')->name('delete.chatbot');
        Route::get('/knowledge/chatbot', 'KnowledgeChat')->name('knowledge.chatbot');
        Route::get('/add/chatbot', 'AddChatbot')->name('add.chatbot');
        Route::post('/store/chatbot', 'StoreChatbot')->name('store.chatbot');
    });



    /*|-------------------------------------Assessment Route x-------------------------------------|*/
    Route::controller(AssessmentController::class)->group(function () {
        Route::get('/all/assessment', 'AllAssessment')->name('all.assessment');
        Route::get('/add/assessment', 'AddAssessment')->name('add.assessment');
        Route::get('/move/assessment', 'MoveAssessment')->name('move.assessment');
    });




    /*|-------------------------------------Document ROute-------------------------------------|*/
    Route::get('/all/doc', [DocumentController::class, 'AllFile'])->name('all.doc');



    /*|-------------------------------------Read Error in log route-------------------------------------|*/
    Route::controller(ReadErrorController::class)->group(function () {

        Route::get('/all/read', 'AllRead')->name('all.read');
    });



    /*|-------------------------------------Chatbot controller-------------------------------------|*/
    Route::controller(ChatBotController::class)->group(function () {
        Route::get('/all/chatbot', 'AllChatBot')->name('all.chatbot');
    });




    /*|-------------------------------------Chat knowledge-------------------------------------|*/
    Route::controller(AddChatController::class)->group(function () {
        Route::get('/add/chatbot', 'AddChatbot')->name('add.chatbot');
        Route::post('/store/chatbot', 'StoreChatbot')->name('store.chatbot');
    });



    /*|-------------------------------------chat route-------------------------------------|*/
    Route::controller(ChatController::class)->group(function () {
        Route::get('/all/chat', 'AllChat')->name('all.chat');
    });



    /*|-------------------------------------Document Route-------------------------------------|*/
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/document/document', 'AllDocument')->name('document.document');
    });
});

require __DIR__ . '/auth.php';

/*|-------------------------------------End Route-------------------------------------|*/

/*|-------------------------------------KIMhean@0203 123-------------------------------------|*/