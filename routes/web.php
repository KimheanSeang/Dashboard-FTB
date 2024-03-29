<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\assessment\AssessmentController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\chat\AddChatController;
use App\Http\Controllers\chat\CheckKnowledgeController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\doc\DocumentController;
use App\Http\Controllers\doc\ReadErrorController;
use App\Http\Controllers\doc\RecoverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Push\PushController;
use App\Http\Controllers\todo\CheckTaskController;
use App\Http\Controllers\todo\ExportController;
use App\Http\Controllers\todo\TodoController;
use App\Http\Controllers\todo\UserTodoController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
    return view('admin.admin_login');
});

/*|-------------------------------------Profile user and Route to Dashboard-------------------------------------|*/
Route::middleware(['auth', 'checkExpiredSession'])->group(function () {

    /*|-------------------------------------Admin Dashboard-------------------------------------|*/
    Route::get('admin/dashboard', function () {
        return view('admin/dashboard');
    })->middleware(['auth', 'verified'])->name('admin/dashboard');

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


    /*|-------------------------------------Permission-------------------------------------|*/
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission')->middleware('permission:all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission')->middleware('permission:add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('export', 'Export')->name('export');
        Route::post('import', 'Import')->name('import');
    });


    /*|-------------------------------------Role and add permission to role route-------------------------------------|*/
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles')->middleware('permission:all.role');
        Route::get('/add/roles', 'AddRoles')->name('add.roles')->middleware('permission:add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission')->middleware('permission:add.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission')->middleware('permission:all.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    });

    /*|-------------------------------------User Route-------------------------------------|*/
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/admin', 'AllAdmin')->name('all.admin')->middleware('permission:all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin')->middleware('permission:add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
        Route::get('/detail/admin/{id}', 'DetailAdmin')->name('detail.admin');

        Route::get('/reset/admin/{id}', 'ResetPassword')->name('reset.admin');
        Route::post('reset/admin/{id}', 'UpdatePassword')->name('reset.admin.update');

        Route::get('/check/user', 'CheckUser')->name('check.user')->middleware('permission:user.check');
        Route::get('/delete/check/{id}', 'DeleteCheck')->name('delete.check');
        Route::get('/edit/user/check/{id}', 'EditUserCheck')->name('edit.user.check');
        Route::post('/update/user/check/{id}', 'UpdateUserCheck')->name('update.user.check');
        Route::get('/approve/user/{id}', 'ApproveUser')->name('approve.user');

        Route::get('export/user', 'ExportUser')->name('export.user');
    });

    /*|-------------------------------------Document Route-------------------------------------|*/
    Route::get('/all/doc', [DocumentController::class, 'AllFile'])->name('all.doc')->middleware('permission:all.doc');


    /*|-------------------------------------Document Route-------------------------------------|*/
    Route::controller(DocumentController::class)->group(function () {

        Route::get('/show/doc/{id}', 'ShowDoc')->name('show.doc');
        Route::get('/view_doc/doc/{id}', 'ViewDoc')->name('view_doc.doc');
        Route::get('/all/doc', 'AllDoc')->name('all.doc')->middleware('permission:all.doc');
        Route::get('/add/doc', 'AddDoc')->name('add.doc')->middleware('permission:add.doc');
        Route::post('/add/doc', 'store')->name('store.doc');
        Route::get('/all/report', 'AllReport')->name('all.report')->middleware('permission:all.report');
        Route::get('/edit/doc/{id}', 'EditDoc')->name('edit.doc');
        Route::post('/update/doc/{id}', 'UpdateDoc')->name('update.doc');
        Route::get('/delete/doc/{id}', 'DeleteDoc')->name('delete.doc');
        Route::get('/view/doc/{id}', 'viewFile')->name('view.doc');
    });


    /*|-------------------------------------Document Need approve-------------------------------------|*/
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/approve/doc', 'ApproveDoc')->name('approve.doc')->middleware('permission:approve.doc');
        Route::get('/view_file/doc/{id}', 'ViewFileDocument')->name('view_file.doc');
        Route::get('/edit_approve/doc/{id}', 'EditDocument')->name('edit_approve.doc');
        Route::post('/update_approve/doc/{id}', 'UpdateDocument')->name('update_approve.doc');
        Route::get('/approve_doc/doc/{id}', 'ApproveDocument')->name('approve_doc.doc');
        Route::get('/approve_delete/doc/{id}', 'ApproveDelete')->name('approve_delete.doc');
    });

    /*|-------------------------------------Document Route-------------------------------------|*/
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/document/document', 'AllDocument')->name('document.document');
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
        Route::get('/knowledge/chatbot', 'KnowledgeChat')->name('knowledge.chatbot')->middleware('permission:knowledge.chatbot');
        Route::get('/add/chatbot', 'AddChatbot')->name('add.chatbot')->middleware('permission:add.chatbot');
        Route::post('/store/chatbot', 'StoreChatbot')->name('store.chatbot');

        Route::get('/check/knowledge', 'CheckKnowledge')->name('check.knowledge')->middleware('permission:check.knowledge');
        Route::get('/view/knowledge/{id}', 'View_Chatbot')->name('view_knowledge.chatbot');
        Route::get('/approve/knowledge{id}', 'ApproveKnowledge')->name('approve.knowledge');
        Route::get('/delete/data/{id}', 'Delete')->name('delete.data');
    });

    /*|-------------------------------------Chat knowledge-------------------------------------|*/
    Route::controller(AddChatController::class)->group(function () {
        Route::get('/add/chatbot', 'AddChatbot')->name('add.chatbot');
        Route::post('/store/chatbot', 'StoreChatbot')->name('store.chatbot');
    });

    /*|-------------------------------------Chatbot route-------------------------------------|*/
    Route::controller(CheckKnowledgeController::class)->group(function () {

        Route::get('/edit/check/knowledge/{id}', 'Edit_checkKnowledge')->name('edit_check.chatbot');
        Route::post('/update/check/knowledge/{id}', 'Update_CheckKnowledge')->name('update_check.chatbot');
    });


    /*|-------------------------------------Assessment Route x-------------------------------------|*/
    Route::controller(AssessmentController::class)->group(function () {
        Route::get('/all/assessment', 'AllAssessment')->name('all.assessment');
        Route::get('/add/assessment', 'AddAssessment')->name('add.assessment');
        Route::get('/move/assessment', 'MoveAssessment')->name('move.assessment');
    });



    /*|-------------------------------------Todo Task-------------------------------------|*/
    Route::controller(TodoController::class)->group(function () {
        Route::get('/all/todo', 'AllTodo')->name('all.todo')->middleware('permission:all.task');
        Route::get('/add/todo', 'AddTodo')->name('add.todo')->middleware('permission:add.task');
        Route::get('/edit/todo/{id}', 'EditTodo')->name('edit.todo');
        Route::post('/store/todo', 'StoreTask')->name('store.todo');
        Route::post('/update/todo/{id}', 'UpdateTask')->name('update.todo');
        Route::get('/delete/todo/{id}', 'DeleteTask')->name('delete.todo');
        Route::get('/todo/trash', 'showTrash')->name('trash.todo')->middleware('permission:trash.task');
        Route::get('/recover/todo/{id}', 'recoverTask')->name('recover.todo');
        Route::get('/permanent/delete/todo/{id}', 'permanentDeleteTask')->name('permanent.delete.todo');
        Route::post('/update-priority/{id}', 'updatePriority')->name('update.priority');
        Route::post('/update-status/{id}', 'updateStatus')->name('update.status');
        Route::match(['post'], '/save/todo', 'saveChanges')->name('save.changes');
    });


    /*|-------------------------------------User Task-------------------------------------|*/
    Route::controller(UserTodoController::class)->group(function () {
        Route::get('user/todo', 'UserTask')->name('user.todo');
        Route::get('/view/user/task/{id}', 'ViewUserTask')->name('view_user.task');
        Route::get('/remove/todo/{id}', 'RemoveTask')->name('remove.todo');
        Route::match(['post'], '/user/todo', 'UserChanges')->name('user.changes');
    });

    /*|-------------------------------------Todo Task-------------------------------------|*/
    Route::controller(CheckTaskController::class)->group(function () {

        Route::get('/check/todo', 'CheckTask')->name('check.todo')->middleware('permission:check.task');
        Route::match(['post'], '/check/todo', 'CheckChanges')->name('check.changes');
        Route::get('/edit/check/{id}', 'EditCheckTask')->name('edit.check');
        Route::post('/update/check/{id}', 'UpdateCheckTask')->name('update.check');
        Route::get('/delete/check/task/{id}', 'DeleteCheckTask')->name('delete.check.task');
        Route::get('/approve/task{id}', 'ApproveTask')->name('approve.task');
    });


    /*|-------------------------------------Read Error in log route-------------------------------------|*/
    Route::controller(ReadErrorController::class)->group(function () {

        Route::get('/all/read', 'AllRead')->name('all.read')->middleware('permission:all.read');
    });


    /*|-------------------------------------Chatbot controller-------------------------------------|*/
    Route::controller(ChatBotController::class)->group(function () {
        Route::get('/all/chatbot', 'AllChatBot')->name('all.chatbot');
    });


    /*|-------------------------------------Export Task to excel-------------------------------------|*/
    Route::controller(ExportController::class)->group(function () {
        Route::get('export/all', 'ExportAllTask')->name('export.all.task');
        Route::get('export/trash', 'ExportTrashTask')->name('export.trash.task');
    });


    /*|-------------------------------------Push Notification to shype and telegram-------------------------------------|*/
    Route::controller(PushController::class)->group(function () {
        Route::get('message', 'Message')->name('message.push');
        Route::get('skype/push', 'Skype')->name('skype.push');
    });
});



/*|-------------------------------------Push Notification to  telegram-------------------------------------|*/
Route::post('/form-submit', function (Request $request) {

    $botToken = env('TELEGRAM_BOT_TOKEN');
    $chatId = env('TELEGRAM_CHAT_ID');

    $userName = auth()->user()->name;
    $title = $request->input('title');
    $user1 = $request->input('user1');
    $user2 = $request->input('user2');
    $description = $request->input('description');
    $telegramMessage = "New Message Push From Dashboard By : $userName \nTitle: $title\nTo: $user1\nAnd: $user2\ndescription: $description";
    $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($telegramMessage);
    $response = file_get_contents($telegramUrl);
    if ($response === false) {
        return response()->json(['error' => 'Failed to send message to Telegram'], 500);
    }
    Session::put('telegramFormData', [
        'title' => $title,
        'user1' => $user1,
        'user2' => $user2,
        'description' => $description,
    ]);
    return redirect()->route('telegram.push');
});

/*|-------------------------------------Route to form push message to telegram group-------------------------------------|*/
Route::get('telegram/push', function () {
    $formData = Session::get('telegramFormData');
    Session::forget('telegramFormData');
    return view('backend.push.telegram')->with('formData', $formData);
})->name('telegram.push');
/*|-------------------------------------End Push Notification to  telegram-------------------------------------|*/


require __DIR__ . '/auth.php';


/*|-------------------------------------End Route-------------------------------------|*/









/*|-------------------------------------show user and password for log in to dashboard-------------------------------------|*/

/*|-------------------------------------User Email Login "Kimhean@gmail.com"-------------------------------------|*/
/*|-------------------------------------User Email Login "superadmin@gmail.com"-------------------------------------|*/
/*|-------------------------------------User Email Login "checker@gmail.com"-------------------------------------|*/
/*|-------------------------------------User Email Login "maker@gmail.com"-------------------------------------|*/
/*|-------------------------------------User Email Login "admin@gmail.com"-------------------------------------|*/
/*|-------------------------------------User Email Login "user@gmail.com"-------------------------------------|*/

/*|-------------------------------------password for all suer-------------------------------------|*/
/*|-------------------------------------Password Login "KIMhean@0203"-------------------------------------|*/
/*|-------------------------------------End User Login to dashboard-------------------------------------|*/






/*|-------------------------------------Not* to install push message to telegram group-------------------------------------|*/
//composer require laravel-notification-channels/telegram



/*|-------------------------------------laravel 11 Install Some-------------------------------------|*/

/*|-------------------------------------php artisan install:broadcasting (install channels)-------------------------------------|*/
/*|-------------------------------------php artisan install:api (install api)-------------------------------------|*/
/*|-------------------------------------php artisan make:middleware EnsureTokenIsValid-------------------------------------|*/
