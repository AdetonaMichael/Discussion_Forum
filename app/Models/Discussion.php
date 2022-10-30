<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','channels','channel_id','slug'];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function markAsBestReply(Reply $reply){
       $this->reply_id = $reply->id;
       $this->save();

    }
    public function getBestReply(){
        return Reply::find($this->reply_id);
    }

    public function bestReply(){
        return $this->belongsTo(Reply::class, 'reply_id');
    }
}
