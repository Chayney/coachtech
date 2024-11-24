<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userProfile()
    {
        return $this->hasOne(Profile::class);
    }

    public function scopeRoleSearch($query, $role)
    {
        if (!empty($role)) {
            $query->whereHas('roles', function ($query) use ($role) {
                $query->where('roles.id', $role);
            });
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->join('profiles', 'users.id', '=', 'profiles.user_id')
                  ->where(function ($query) use ($keyword) {
                      $query->Where('users.email', 'like', '%' . $keyword . '%')
                            ->orWhere('profiles.name', 'like', '%' . $keyword . '%');
            });
        }
    }
}
