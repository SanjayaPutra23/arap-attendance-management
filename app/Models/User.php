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
        'nik',
        'peserta_id',
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

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function permohonanIzins()
    {
        return $this->hasMany(PermohonanIzin::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * URL Avatar pengguna: foto kustom jika ada, atau avatar SVG deterministik berbasis identitas akun
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && $this->avatar !== 'default.png' && file_exists(public_path('assets/img/avatars/' . $this->avatar))) {
            return asset('assets/img/avatars/' . $this->avatar);
        }

        return route('avatar.svg', $this->id);
    }

    /**
     * mengecek apakah user punya role (1role)
     * @param string $role
     * @return bool
     */
    public function hasAnyRole(string $role)
    {
        return $this->roles->contains(function ($r) use ($role) {
            return strcasecmp($r->name, $role) === 0;
        });
    }

    /**
     * chek user nya punya beberapa role atau tidak
     * @param array $role
     * @return bool
     */
    public function hasAnyRoles(array $role)
    {
        $lowerRoles = array_map('strtolower', $role);
        return $this->roles->contains(function ($r) use ($lowerRoles) {
            return in_array(strtolower($r->name), $lowerRoles);
        });
    }
}
