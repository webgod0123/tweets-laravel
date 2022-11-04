<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tweet;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        $ids = $this->following()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id', $ids)
            ->latest()
            ->paginate(10);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function follow(User $user)
    {
        return $this->following()->save($user);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follower()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function followingExists(User $user)
    {
        return $this->following()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function followings()
    {
        return $this->following()
            ->orderBy('name')
            ->paginate(10);
    }

    public function followers()
    {
        return $this->follower()
            ->orderBy('name')
            ->paginate(10);
    }
}