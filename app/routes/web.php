<?php

use App\Http\Controllers\DisplayController;

use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\UsersController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AdminController;

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

Auth::routes();

    // メインページ表示
    Route::get('/', [DisplayController::class, 'index'])->name('index');

    // 管理者ログイン用
    //下記を追記する
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

    Route::view('/home', 'home')->middleware('auth');
    // Route::view('/admin', 'admin');

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

        // 再開確認画面
        Route::get('/admin/{id}/restart', [AdminController::class, 'userRestartConf'])->name('restart.user.conf');
        // 再開完了
        Route::post('/admin/{id}/restart', [AdminController::class, 'userRestartComp'])->name('restart.user.comp');

        // 停止確認画面
        Route::get('/admin/{id}/stop', [AdminController::class, 'userStopConf'])->name('stop.user.conf');
        // 停止完了
        Route::post('/admin/{id}/stop', [AdminController::class, 'userStopComp'])->name('stop.user.comp');


    //上記までを追記する

// ログイン時にしか表示させない箇所はミドルウェアの設定を入れる

Route::group(['middleware' => 'auth'], function() {

    // 検索機能
    Route::get('/search', [DisplayController::class, 'searchForm'])->name('search');
    Route::post('/search', [DisplayController::class, 'search']);

        // SELECT(service詳細) 
        Route::get('/service/{service}/detail', [DisplayController::class, 'serviceDetail'])->name('service.detail');

        // request_form(依頼登録へ)
        Route::get('/request_form/{service}', [DisplayController::class, 'request_form'])->name('request_form');

        // violation_form(違反登録へ)
        Route::get('/violation_form/{service}', [DisplayController::class, 'violation_form'])->name('violation_form');

        // INSERT(依頼)
        Route::post('/request_conf', [RegistrationController::class, 'request_conf'])->name('create.request');
        Route::post('/request_comp', [RegistrationController::class, 'request_comp'])->name('comp.request');

        // INSERT(違反)
        Route::post('/violation_conf', [RegistrationController::class, 'violation_conf'])->name('create.violation');
        Route::post('/violation_comp', [RegistrationController::class, 'violation_comp'])->name('comp.violation');

    Route::group(['middleware' => 'can:view,service'], function() {

        // 投稿詳細（マイページから）
        Route::get('/user/service/{service}/detail', [DisplayController::class, 'serviceUserDetail'])->name('user.service.detail');

            // 投稿変更（update）
            Route::get('/service/{service}/edit', [RegistrationController::class, 'editServiceForm'])->name('edit.service');
            Route::post('/service/{service}/edit', [RegistrationController::class, 'editService']);

            // 投稿削除（delete）
            Route::get('/service/{service}/delete/conf', [RegistrationController::class, 'serviceDeleteConf'])->name('delete.service.conf');
            Route::post('/service/{service}/delete/comp', [RegistrationController::class, 'serviceDeleteComp'])->name('delete.service.comp');
       
    });



    // いいね機能
        //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
         Route::post('ajaxlike', [DisplayController::class,'ajaxlike'])->name('posts.ajaxlike');

    // mypage(マイページへ)
    Route::get('/mypage', [DisplayController::class, 'mypage'])->name('mypage');    

        //プロフィール編集画面表示
        Route::get('/profile', [UsersController::class, 'show'])->name('profile');
        //プロフィール編集
        Route::post('/profile', [UsersController::class, 'profileUpdate'])->name('profile_edit');

        // 退会確認画面
        Route::get('/user', [UsersController::class, 'userDeleteConf'])->name('delete.user.conf');
        // 退会完了
        Route::post('/user', [UsersController::class, 'userDeleteComp'])->name('delete.user.comp');

        // post_form(新規登録へ)
        Route::get('/post_form', [DisplayController::class, 'post_form'])->name('post_form');

            // INSERT(投稿)
            Route::post('/post_conf', [RegistrationController::class, 'post_conf'])->name('create.post');
            Route::post('/post_comp', [RegistrationController::class, 'post_comp'])->name('comp.post');

    Route::group(['middleware' => 'can:view,requests'], function() {

        // 依頼詳細（マイページから）
        Route::get('/user/request/{requests}/detail', [DisplayController::class, 'requestUserDetail'])->name('user.request.detail');
       
        // 投稿変更（update）
        Route::get('/request/{requests}/edit', [RegistrationController::class, 'editRequestForm'])->name('edit.request');
        Route::post('/request/{requests}/edit', [RegistrationController::class, 'editRequest']);
    });

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
