<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Admin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'icon' => ['image'],   
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if (isset($data['icon'])) {
            $img_file = $data['icon'];
            //画像がアップロードされたのか確認
            if ($img_file->isValid()) {
                // 拡張子つきでファイル名を取得
                $imageName = $img_file->getClientOriginalName();

                // 拡張子のみ
                $extension = $img_file->getClientOriginalExtension();

                // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
                $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

                $img_file->move(public_path() . "/img/icon", $newImageName);
                $icon = $newImageName;
            } else {
                $icon = '';
            }
        } else {
            $icon = '';
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'icon' => $icon,
            'password' => Hash::make($data['password']),
        ]);
    }

    //下記を追記する
    protected function validatorAdmin(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    protected function createAdmin(Request $request)
    {
        $this->validatorAdmin($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }
    //上記までを追記する
}

