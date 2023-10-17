<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = ['user_id', 'service_id', 'content', 'tel', 'email', 'deadline', 'status_id','del_flg'];

    public function status() {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function service() {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
