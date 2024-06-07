<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
            'admin' => 'boolean'
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            table: 'role_user',
            foreignPivotKey: 'user_id',
            relatedPivotKey: 'role_name',
            parentKey: 'id',
            relatedKey: 'name',
            relation: 'roles'
        );
    }

    protected function fullNameAndEmail(): Attribute
    {
        return Attribute::get(
            fn ($valoreInutile, $attr) => $this->maiusc_name . ' ' . $this->email,
        );
    }

    protected function maiuscName(): Attribute
    {
        return Attribute::get(
            fn ($valoreInutile, $attr) => strtoupper($attr['name']),
        );
    }

    protected function mobileNumber(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->profile?->phone ?? 'N/A',
            set: function ($value) {
                if ($this->profile) {
                    $this->profile->phone = $value;
                    $this->profile->save();
                    return;
                }

                $this->profile()->create(['phone' => $value]);
            },
        );

        /**
         * $user->mobile_number = "+3495876218";
         */
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => "{$attributes['name']} {$attributes['surname']}",
            set: function ($value, $attributes) {
                [$name, $surname] = explode(' ', $value, 2);
                return [
                    'name' => $name,
                    'surname' => $surname
                ];
            }
        );
    }
}
