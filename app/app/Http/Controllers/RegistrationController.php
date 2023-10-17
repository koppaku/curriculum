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



class RegistrationController extends Controller
{

    // 新規投稿確認画面へ
    public function post_conf(CreateService $request)
    {

        if(isset($request->image)){
        // 拡張子つきでファイル名を取得
        $imageName = $request->file('image')->getClientOriginalName();

        // 拡張子のみ
        $extension = $request->file('image')->getClientOriginalExtension();

        // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

        $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
        $image = "/img/tmp/" . $newImageName;
        } else {
            $newImageName = '';
            $image = '';
        }

        // dd($image);

        return view('post/post_conf', [
            'title' => $request['title'],
            'content' => $request['content'],
            'amount' => $request['amount'],
            'image'        => $image,
            'newImageName' => $newImageName,
        ]);
    }

        // 新規投稿（DB登録）
        public function post_comp(Request $request) {
        
            $service = new Service;

            $service->title = $request->title;
            $service->content = $request->content;
            $service->amount = $request->amount;
            $service->image = $request->image;

            if(isset($request->image)){
                // レコードを挿入したときのIDを取得
                $lastInsertedId = $service->id;

                // ディレクトリを作成
                if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
                    mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
                }

                // 一時保存から本番の格納場所へ移動
                rename(public_path() . "/img/tmp/" . $request->image, public_path() . "/img/" . $lastInsertedId . "/" . $request->image);
                
                // 一時保存の画像を削除
                \File::cleanDirectory(public_path() . "/img/tmp");
            }
            
            Auth::user()->service()->save($service);


            return view('post/post_comp', []);
        }
    
        // 投稿編集画面へ
        public function editServiceForm(Service $service) {

            // $service = new Service;

            // $result = $service->find($id);

            return view('post/post_edit', [
                'result' => $service,
                'id' => $service->id,
            ]);
        }

            // 投稿編集（update）
            public function editService(Service $service,CreateService $request) {

                // $instance = new Service;
                // $record = $instance->find($id);

                $record = $service;

                if(isset($request->image)){
                    // 拡張子つきでファイル名を取得
                    $imageName = $request->file('image')->getClientOriginalName();
            
                    // 拡張子のみ
                    $extension = $request->file('image')->getClientOriginalExtension();
            
                    // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
                    $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
            
                    $request->file('image')->move(public_path() . "/img", $newImageName);
                    $image = $newImageName;
                } else {
                    $image = '';
                }     

                $colums = ['title', 'content', 'amount',];

                foreach($colums as $colum){
                    $record->$colum = $request->$colum;
                }

                $record->image = $image;

                // dd($request->image);

                $record->save();

                return redirect('/mypage');
            }

        // 投稿削除確認画面へ
        public function serviceDeleteConf(Service $service) {

            // $service = new Service;

            // $instance = $service->find($id);
            
            return view('post/post_delete_conf', [
                'instance' => $service,
                'id' => $service->id,
            ]);
        }

            // 投稿削除完了画面へ
                public function serviceDeleteComp(Service $service) {

                // $service = new Service;
                
                $service->where('id', '=', $service->id)
                        ->update([
                            'del_flg'  => 1,    
                        ]);
                
                return view('post/post_delete_comp', []);
            }

    // 依頼登録確認画面へ
    public function request_conf(CreateRequest $request)
    {
        return view('request/request_conf', [
            'requests' => $request->all(),
        ]);
    }

        // 依頼登録（DB登録）
        public function request_comp(Request $request) {

            $requests = new Requests;

            $requests->service_id = $request->service_id;
            $requests->content = $request->content;
            $requests->tel = $request->tel;
            $requests->email = $request->email;
            $requests->deadline = $request->deadline;

            Auth::user()->request()->save($requests);

            return view('request/request_comp', []);
        }

    // 依頼編集画面へ
    public function editRequestForm(Requests $requests) {

        // $requests = new Requests;
        $status = new Status;

        $result = $requests->with('service')->find($requests->id);

        $statuses = $status->get();

        return view('request/request_edit', [
            'result' => $result,
            'statuses' => $statuses,
            'id' => $requests->id,
        ]);
    }

        // 依頼編集（update）
        public function editRequest(Requests $requests,CreateRequest $request) {

            // $instance = new Requests;
            // $record = $instance->find($id);

            $record = $requests;

            $colums = ['content', 'tel', 'email', 'deadline', 'status_id'];

            foreach($colums as $colum){
                $record->$colum = $request->$colum;
            }

            $record->save();

            return redirect('/mypage');
        }

    

    // 違反確認画面へ
    public function violation_conf(CreateViolation $request){

        return view('violation/violation_conf', [
            'violations' => $request->all(),
        ]);
    }

    // 違反登録（DB登録）
    public function violation_comp(Request $request) {

        $violation = new Violation;

        $violation->service_id = $request->service_id;
        $violation->comment = $request->comment;

        Auth::user()->violation()->save($violation);

        return view('violation/violation_comp', []);
    }

}
