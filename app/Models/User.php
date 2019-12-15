<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'isAdmin' => 'boolean'
    ];
    
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
    
    public function views()
    {
        return $this->hasMany(View::class, 'id_user', 'id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'id_user', 'id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_user', 'id');
    }
}
