<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissions;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role (){
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }
    public function groups()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}