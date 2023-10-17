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

use App\Like;

use App\Admin;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {

        $violation = new Violation;

        $delete_users = User::onlyTrashed()->withCount('service')->take(10)->get();

        // $delete_users_count = User::onlyTrashed()->withCount('service')->get();

        // $violation_list = $violation->with(['service' => function($query){
        //     $query->with('user');
        // }])->take(20)->get();

        // $violation_list = Violation::groupBy('service_id')->get('service_id');

        // $violation_list = Violation::distinct()->select('service_id')->with(['service' => function($query){
        //         $query->with('user');
        //     }])->take(20)->get();
        


        // $violation_list = Violation::distinct()->select('service_id')->withCount(['service' => function ($query) {
        //     $query->with('user');
        // }])->orderBy('service_count', 'desc')->limit(20)->get();

        // $employees = collect([
        //     foreach ($violation_list as $violation) {
        //         ['service_id' => $violation->service_id],
        //     }
        // ]);

        // $employees->duplicates('service_id');

        $violation_list = Violation::select('service_id')->selectRaw('COUNT(service_id) as count_serviceId')->groupBy('service_id')->orderBy('count_serviceId', 'desc')->with(['service' => function($query){
            $query->with('user');
        }])->take(20)->get();

        // $violation_list = Violation::distinct()->select('service_id')->with(['service' => function($query){
        //     $query->with('user');
        // }])->take(20)->get();

        // dd($delete_users);
        // dd($delete_users_count);
        // dd($violation_list);


        return view('admin/administrator', [
            'delete_users' => $delete_users,
            'violation_list' => $violation_list,
        ]);
    }

    // 再開確認ページへ
    public function userRestartConf(int $id)
    {
        $user = new User;

        $user_detail = $user->withTrashed()
                            ->where('id', $id)
                            ->get();
        
        if(is_null($user_detail)){
            abort(404);
        }

        // dd($user_detail);

        return view('admin/resume_conf', [
            'user_detail' => $user_detail,
        ]);
    }

        // 再開完了
        public function userRestartComp(int $id)
        {
            User::onlyTrashed()->where('id', $id)->restore();

            if(is_null(User::find($id))){
                abort(404);
            }

            return view('admin/resume_comp', []);
        }


    // 退会確認ページへ
    public function userStopConf(int $id)
    {
        $user = new User;

        $user_detail = $user->where('id', $id)->get();

        if(is_null($user_detail)){
            abort(404);
        }

        // dd($user_detail);

        return view('admin/stop_conf', [
            'user_detail' => $user_detail,
        ]);
    }

        // 退会完了
        public function userStopComp(int $id)
        {
            User::find($id)->delete();

            if(is_null(User::find($id))){
                abort(404);
            }

            return view('admin/stop_comp', []);
        }

}

