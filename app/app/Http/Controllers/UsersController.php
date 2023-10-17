<?php

// DisplayCOntroller.php ファイルの場所
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

// ファイルを使う
use App\Service;

use App\Requests;

use App\Violation;

use App\Status;

use App\User;

use App\Http\Requests\CreateService;

use App\Http\Requests\CreateRequest;

use App\Http\Requests\CreateViolation;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    /**
     * プロフィール編集画面表示
     * @return View プロフィール編集画面
     */
    public function show()
    {
        $user = Auth::user();

        return view('user/user_edit', [
            'user' => $user
        ]);
    }

    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param Request $request
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    public function profileUpdate(Request $request)
    {

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('mypage');
    }

    // 退会確認ページへ
    public function userDeleteConf()
    {
        return view('user/user_delete_conf');
    }

    // 退会完了
    public function userDeleteComp()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect(route('login'));
    }


}
