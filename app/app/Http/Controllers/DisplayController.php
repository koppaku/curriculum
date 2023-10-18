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

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;



class DisplayController extends Controller
{
    public function index() {

        $service = new Service;

        $all_service = $service->with('user')->where('del_flg', '=', 0)->simplePaginate(6);

        // $all_service = $service->user()->where('del_flg', '=', 0)->get()->toArray();

        // dd($all_service);

        $text = '';
        $from = '';
        $until = '';
        $message = '';
        $favorite = 0;

        return view('main', [
            'services' => $all_service,
            'text' => $text,
            'from' => $from,
            'until' => $until,
            'message' => $message,
            'favorite' => $favorite,
        ]);
    }

    // 日付検索を表示

    public function searchForm(Request $request){

        $service = new Service;
        $like = new Like;


        // 検索データ
        $text = $request->input('text');
        $from = $request->input('from');
        $until = $request->input('until');
        $favorite = $request->input('favorite');

        if ($favorite == 1) {

            $user = Auth::user()->id;

            $all_service = $like->with('service')->with('user')->where('user_id',$user)->whereHas('service', function($query1) use($text){

                // テキスト検索
                if (isset($text)) {
                    $query1->where('title', 'LIKE', "%$text%")->orwhere('content', 'LIKE', "%$text%");
                }
    
                })->whereHas('service', function($query2) use($from, $until){
                // 金額検索
                if (isset($from) && isset($until)) {
                    $query2->whereBetween('amount', [$from, $until]);
    
                } elseif(isset($from)) {
                    $query2->where('amount', '>=', $from);
    
                } elseif(isset($until)) {
                    $query2->where('amount', '<=', $until);
    
                }
                
            })->simplePaginate(6);
        } else {
            // 検索条件
            $all_service = $service->with('user')->where(function($query1) use($text){

            // テキスト検索
            if (isset($text)) {
                $query1->where('title', 'LIKE', "%$text%")->orwhere('content', 'LIKE', "%$text%");
            }

            })->where(function($query2) use($from, $until){
            // 金額検索
            if (isset($from) && isset($until)) {
                $query2->whereBetween('amount', [$from, $until]);

            } elseif(isset($from)) {
                $query2->where('amount', '>=', $from);

            } elseif(isset($until)) {
                $query2->where('amount', '<=', $until);

            }
            
            })->where('del_flg', '=', 0)->simplePaginate(6);
        }   


        if(isset($from) && isset($until) && $from > $until) {
            $message = '金額が正しくありません';
        } else {
            $message = '';
        }

        // dd($all_service);

        return view('main', [
            'services' => $all_service,
            'text' => $text,
            'from' => $from,
            'until' => $until,
            'message' => $message,
            'favorite' => $favorite,
        ]);
    }

    // 詳細画面へ（誰でも見れる）
    public function serviceDetail(Service $service) {
        // Eloquent
        // モデルのインスタンスを生成し、変数serviceに代入
        // $service = new Service;

        $servicedetail = $service->with('user')->find($service);

        // いいね機能
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $posts = Service::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
        $like_model = new Like;

        // dd($servicedetail);

        return view('detail', [
            'servicedetail' => $servicedetail[0],
            'posts' => $posts,
            'like_model'=>$like_model,
        ]);
        
    }

    // いいね機能

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $service_id = $request->service_id;
        $like = new Like;
        $post = Service::find($service_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $service_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('service_id', $service_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->service_id = $request->service_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    // マイページ画面へ
    public function mypage() {

        $all_user_service = Auth::user()->Service()->where('del_flg', '=', 0)->get()->toArray();

        $all_user_request = Auth::user()->Request()->with('service')->with('status')->where('del_flg', '=', 0)->get()->toArray();

        return view('mypage', [
            'services' => $all_user_service,
            'requests' => $all_user_request,
        ]);
    }

        // 投稿詳細画面へ（マイページから※編集・削除機能付き）
        public function serviceUserDetail(Service $service) {
            // Eloquent
            // モデルのインスタンスを生成し、変数serviceに代入
            // $service = new Service;

            // $servicedetail = $service->find($serviceId);

            return view('post/post_detail', [
                'servicedetail' => $service,
            ]);
            
        }
        // 依頼詳細画面へ
        public function requestUserDetail(Requests $requests) {
            // Eloquent
            // モデルのインスタンスを生成し、変数serviceに代入
            // $request = new Requests;

            $requestdetail = $requests->with('service')->with('status')->find($requests);

            return view('request/request_detail', [
                'requestdetail' => $requestdetail[0],
            ]);
            
        }

    // 新規登録画面へ
    public function post_form() {

        return view('post/post_form', []);
    }

    // 依頼登録画面へ
    public function request_form(Service $service) {

        // $service = new Service;

        // $servicedetail = $service->find($serviceDetailId);

        return view('request/request_form', [
            'serviceId' => $service->id,
            'servicedetail' => $service,
        ]);
    }
    
    // 違反登録画面へ
    public function violation_form(Service $service) {

        // $service = new Service;

        // $servicedetail = $service->find($serviceDetailId);

        return view('violation/violation_form', [
            'serviceId' => $service->id,
            'servicedetail' => $service,
        ]);
    }

}

