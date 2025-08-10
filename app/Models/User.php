<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telp',
        'afiliasi',
        'type',
        'avatar',
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


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * mengecek apakah user punya role (1role)
     * @param string $role
     * @return bool
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     *  chek user nya punya beberapa role atau tidak
     * @param array $role
     * @return bool
     */
    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
}
