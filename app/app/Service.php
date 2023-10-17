<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'amount', 'image', 'del_flg'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

  //   public function user() {
  //     return $this->hasMany('App\User');
  // }
    

    public function likes()
    {
      return $this->hasMany(Like::class, 'service_id');
    }

    // public function isLikedBy($user): bool {
    //     return Like::where('user_id', $user->id)->where('service_id', $this->id)->first() !==null;
    // }

}
