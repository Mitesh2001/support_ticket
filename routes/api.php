<?php

use App\Http\Controllers\api\v1\CityController;
use App\Http\Controllers\api\v1\ClientController;
use App\Http\Controllers\api\v1\InwardController;
use App\Http\Controllers\api\v1\JobController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\RidfController;
use App\Http\Controllers\api\v1\TaskController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\FeedbackController;
use App\Http\Controllers\api\v1\JobSubmitController;
use App\Http\Controllers\api\v1\ProductTypeController;
use App\Http\Controllers\api\v1\ComplainTypesController;
use App\Http\Controllers\api\v1\DashboardController;
use App\Http\Controllers\api\v1\NotificationController;
use App\Http\Controllers\api\v1\StateController;
use App\Models\ComplainType;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {

    Route::get('expenses',function ()
    {
        return response()->json(DB::table('expenses')->get());
    });

    Route::post('expenses',[ComplainTypesController::class,'addExpense']);

    Route::post('user', [UserController::class,'register']);

    Route::post('forgot-password', [UserController::class,'forgotpassword']);
    Route::post('verify-otp', [UserController::class,'verifyOTP']);
    Route::post('reset-password', [UserController::class,'resetpassword']);

    Route::post('login', [UserController::class,'authenticate']);

    Route::group(['middleware' => ['jwt.verify']], function() {

        Route::post('logout', [UserController::class,'logout']);

        Route::get('user', [UserController::class,'getAuthenticatedUser']);
        Route::put('user', [UserController::class,'profileUpdate']);
        Route::post('user-update', [UserController::class,'userUpdate']);
        Route::get('users',[UserController::class,'UserList']);

        Route::resource('client', ClientController::class);
        // Route::post('client-update',[ClientController::class,'update']);

        Route::resource('task',TaskController::class);
        Route::get('task_types',[TaskController::class,'allTaskTypes']);
        Route::post('task_status_change',[TaskController::class,'statusChange']);

        Route::resource('jobs',JobController::class);
        Route::resource('job_submit',JobSubmitController::class);
        Route::post('job_reopen',[JobController::class,'reOpenJob']);
        Route::post('job_status_change',[JobController::class,'statusChange']);

        Route::resource('inwards',InwardController::class);
        Route::get('tasks_list',[TaskController::class,'inwardAbleTasksList']);
        Route::post('inward_status_change',[InwardController::class,'statusChange']);

        Route::resource('ridf',RidfController::class);
        Route::post('ridf_status_change',[RidfController::class,'statusChange']);

        Route::resource('product',ProductController::class);
        Route::post('stock_check',[ProductController::class,'stockCheck']);

        Route::resource('product_types',ProductTypeController::class);

        Route::resource('complain_types',ComplainTypesController::class);

        Route::resource('feedback',FeedbackController::class);
        Route::post('feedback_status_change',[FeedbackController::class,'statusChange']);

        Route::get('cities',[CityController::class,'index']);
        Route::resource('state',StateController::class);

        Route::get('notifications',[NotificationController::class,'index']);
        Route::get('notifications_markall',[NotificationController::class,'markAll']);
        Route::get('notifications_mark_as_read/{id}', [NotificationController::class,'markRead']);

        Route::get('dashboard',[DashboardController::class,'dashboard']);

    });

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
