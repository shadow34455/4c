<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\MessagesController;
use App\Models\admin;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PublicServicesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\TagController;
use App\Models\question;
use App\Models\answer;
use App\Models\public_services;
use App\Models\services;
use App\Http\Controllers\ZipController;

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
// Route::get('/admin', function () {
//     return view('theme.default');
// });
// Auth::routes(['verify' => true]);

Route::prefix('/search')->group(function() {
    Route::post('/Question', [ QuestionController::class,'index'])->name('search.Question');    
    Route::post('/publicserves', [ PublicServicesController::class,'index'])->name('search.publicserves');
    Route::post('/Users', [ UserController::class,'index'])->name('search.Users');
    Route::post('/Tags', [ TagController::class,'index'])->name('search.Tags');
    });


Route::group(['middleware'=>['auth', 'verified']],function(){
    Route::group(['middleware'=>['registration_completed']],function(){
        Route::get('/dashboard', function () {
            return redirect()->route('user_profile',['username'=> auth()->user()->username]);
        })->name('dashboard');
    });

    Route::get('register-step2',
        [\App\Http\Controllers\RegisterStepTwoController::class,'create'])
        ->name('register-step2.create');
    Route::post('register-step22',
        [\App\Http\Controllers\RegisterStepTwoController::class,'store'])
        ->name('register-step2.post');
});


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/all')->group(function() {
Route::get('/Question', [ QuestionController::class,'index'])->name('all.Question');    
Route::get('/publicserves', [ PublicServicesController::class,'index'])->name('all.publicserves');
Route::get('/Users', [ UserController::class,'index'])->name('all.Users');
Route::get('/Tags', [ TagController::class,'index'])->name('all.Tags');
});

Route::prefix('/messages')->group(function() {
    Route::get('{username}/inbox', [MessagesController::class,"index"])->name('messages.index');
    Route::get('{username}/sent', [MessagesController::class,"sent"])->name('messages.sent');
    Route::get('NewMessage', [MessagesController::class,"NewMessage"])->name('messages.NewMessage');
    Route::post("store/NewMessage",[MessagesController::class,"store"])->name('store.NewMessage');
    });



Route::get('user/login', function () {
    return view('welcome_login');
})->name("welcome_login");
Route::get('/null', function () {
    return view('null');
});

Route::get('/questions/show/{id}/posts', [QuestionController::class,"show"])->name('questions.show');


Route::resource('services',ServicesController::class);
Route::get('/{id}/servies', [ServicesController::class,"index"])->name('user.servies');
Route::get('/{id}/servies/Customer', [ServicesController::class,"reqindex"])->name('Customer.servies');

Route::post('/{id}/public_servies/bid', [UserController::class,"bid"])->name('public_servies.bid');

Route::get('user/{username}', function ($username) {
    $user = User::where('username', $username)->first();
    $number_of_questions = question::where('user_id',$user->id)->count();
    $number_of_answer = answer::where('user_id',$user->id)->count();
    $number_of_services_requests = services::where('user_id',$user->id)->count() + public_services::where('user_id',$user->id)->count();
    $number_of_services_accepted= services::where('competitor_id',$user->id)->count() + public_services::where('Personal_account_id',$user->id)->count();
   
    if ($user == null) {
        abort(404);
    }
    return view('profile', ['profile' => $user],compact('number_of_questions', 'number_of_answer', 'number_of_services_requests','number_of_services_accepted'));
})->name('user_profile');


Route::resource('task', TasksController::class);

 Route::prefix('/admin/admin')->middleware('can:Admin')->group(function() {
    Route::post("/send/message/all",[AdminController::class,"send_messages_all"])->name("send.all");
Route::post("/send/message/Customer",[AdminController::class,"send_messages_Customer"])->name("send.Customer");
Route::post("/send/message/Competito",[AdminController::class,"send_messages_Competito"])->name("send.Competito");
Route::post("/send/message/admin",[AdminController::class,"send_messages_admin"])->name("send.admin");

    Route::get('/', [AdminController::class,"index"])->name('admin.index');
    Route::get('/send', [AdminController::class,"send_messages"])->name('admin.send');

    Route::get('/users', [UserController::class,"userstable"])->name('admin.users');
   Route::get('/admin/cr', function () {
    return view('admin.create');
})->name('admin.create');

Route::get('/admin/fields/fff', function () {
    return view('fields.create');
})->name('fields.create');
    Route::patch('/{user}/admin',[UserController::class,"adminUpdate"])->name('user.update');
    Route::delete('/user/{user}',[UserController::class,"adminDestroy"])->name('user.delete');
    Route::get('/posts', [PostsController::class,"index"])->name('admin.posts');
    Route::resource('field', FieldsController::class);
    Route::get('/posts/edit/{id}', [PostsController::class,"edit"])->name('posts.edit');
    Route::patch('/posts/update/{id}', [PostsController::class,"edit"])->name('posts.update');
    Route::delete('/posts/{posts}',[PostsController::class,"destroy"])->name('posts.delete');
    Route::patch('/{user}/block', [UserController::class,"adminBlock"])->name('user.block');
    Route::get('/users/blocked', [UserController::class,"blockedUsers"])->name('user.blocked');
    Route::patch('/{user}/open', [UserController::class,"openBlock"])->name('user.unblock');

});




    Route::get('services/services/{id}',[ ServicesController::class,'create'])->name('services.create');
    Route::get('public/services',[ PublicServicesController::class,'create'])->name('publicservices.create');
    Route::get('create/Question',[ QuestionController::class,'create'])->name('Question.create');

    Route::get('services/services/new',[ ServicesController::class,'newcreate'])->name('services.newcreate');
    Route::post('/create/serves', [ ServicesController::class,'store'])->name('create.serves');
    Route::post('/create/publicserves', [ PublicServicesController::class,'store'])->name('create.publicserves');
    Route::post('/create/Question', [ QuestionController::class,'store'])->name('create.Question');
    Route::post('/create', [  QuestionController::class,'store']);


    Route::post('/create/post', [  PostsController::class,'store']);
    Route::post('/uplod',[  PostsController::class,'upload_image_cke'])->name('ckeditor.upload');


    Route::get('/show/serves/{id}', [ ServicesController::class,'show'])->name('show.serves');

    Route::get('/download/download/download/download/download',[ ServicesControDownloadControllerller::class,'getDownload']);
    Route::controller(GoogleController::class)->group(function(){
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });

   
    Route::patch('/{id}/serves/Acceptance', [ServicesController::class,"Acceptance"])->name('serves.Acceptance')->middleware('can:personal account');
    Route::patch('/{id}/serves/Refusal', [ServicesController::class,"Refusal"])->name('serves.Refusal')->middleware('can:personal account');
    Route::patch('/{id}/serves/pay', [ServicesController::class,"pay"])->name('serves.pay')->middleware('can:business account');





route::get('createpaypal',[PaypalController::class,'createpaypal'])->name('createpaypal');

route::get('processPaypal',[PaypalController::class,'processPaypal'])->name('processPaypal');

route::get('processSuccess',[PaypalController::class,'processSuccess'])->name('processSuccess');

route::get('processCancel',[PaypalController::class,'processCancel'])->name('processCancel');



Route::get('/process/{order_no}', [PaypalController::class, 'processPaypal'])->name('process');
Route::get('/success', [PaypalController::class, 'processSuccess'])->name('success');
Route::get('/cancel', [PaypalController::class, 'processCancel'])->name('cancel');

Route::get('/connect', [PaypalController::class, 'connect'])->name('connect');
Route::get('/connect/success', [PaypalController::class, 'connectSuccess'])->name('connect.success');




Route::get('/creatadmin', [AdminController::class,"creatadmin"])->name('admin.creatadmin');
Route::post('/newadmin',[AdminController::class,'newadmin'])->name('admin.newadmin');

Route::get('/creattag',[TagController::class,"create"])->name('admin.creattag');
Route::post('/newtag',[TagController::class,'store'])->name('admin.newtag');




Route::get('download-zip/{path}', [ZipController::class, "downloadZip"])->name("donlode");
