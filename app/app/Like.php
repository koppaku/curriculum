<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // 配列内の要素を書き込み可能にする
    protected $fillable = ['service_id','user_id'];

    public function service() {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function like_exist($user_id, $service_id) {        
        return Like::where('user_id', $user_id)->where('service_id', $service_id)->exists();       
    }

    
}
