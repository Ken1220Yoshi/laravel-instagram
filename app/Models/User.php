<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(){
        return $this->hasMany(Post::class)->withTrashed()->latest();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function followers(){
        return $this->hasMany(Follow::class,'following_id');
    }

    public function followings(){
        return $this->hasMany(Follow::class,'follower_id');
    }

    public function isFollowed(){
        return $this->followers()->where('follower_id',Auth::id())->exists();
    }

    public function isFollowing($followingId){
        return $this->followings()->where('following_id',$followingId)->exists();
    }

    public function isAdmin(){
        return $this->role_id === 1;
    }


    
}
