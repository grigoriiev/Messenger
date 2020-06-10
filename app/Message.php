<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Message extends Model
{
    protected $table = 'messages';

    protected $guarded=[];

    public function Message (){

        return $this->hasMany($this, 'parent_id')->where('personal_id',0);

    }
    public function personalMessage($id){
        return $this->where('personal_id',$id)->paginate(2);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function children(){
        return $this->hasMany('App\Message', 'parent_id', 'id');
    }

    public function rootMessages(){
        return $this->where(['parent_id'=>0,'personal_id'=>0])->with('Message')->paginate(2);
    }
}
