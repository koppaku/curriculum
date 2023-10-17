<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{

    protected $fillable = ['user_id', 'service_id', 'comment'];

    public function service() {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
