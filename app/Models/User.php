<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
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
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    /**
     * Relasi ke Role (Many to Many).
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Cek apakah user memiliki 1 role tertentu (case-insensitive).
     */
    public function hasAnyRole(string $role): bool
    {
        return $this->roles->contains(function ($r) use ($role) {
            return strcasecmp($r->name, $role) === 0;
        });
    }

    /**
     * Alias hasRole untuk kemudahan pemanggilan.
     */
    public function hasRole(string $role): bool
    {
        return $this->hasAnyRole($role);
    }

    /**
     * Cek apakah user memiliki salah satu dari daftar role yang diberikan.
     */
    public function hasAnyRoles(array|string $roles): bool
    {
        if (is_string($roles)) {
            return $this->hasAnyRole($roles);
        }

        $lowerRoles = array_map('strtolower', $roles);
        return $this->roles->contains(function ($r) use ($lowerRoles) {
            return in_array(strtolower($r->name), $lowerRoles, true);
        });
    }
}
