<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
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

    protected $attributes = [
        'role' => UserRoleEnum::USER->value,
    ];

    public function visits() : HasMany {
        return $this->hasMany(DestinationVisit::class);
    }

    public function scopeOnlyAdmin($query) {
        $query->where('role', UserRoleEnum::ADMIN->value);
    }

    public function scopeOnlyUser($query) {
        $query->where('role', UserRoleEnum::USER->value);
    }


    public function getShowImageAttribute() : string {
        return $this->image ?? '/assets/images/users/avatar-2.jpg';
    }
}
