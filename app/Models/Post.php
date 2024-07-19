<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function comment(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    

    //いいねしてるかチェック
    public function isLikeByUser(){
        return $this->like()->where('user_id',Auth::id())->exists();

    }


}
