<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\V1\UserProfile;
use App\Models\V1\UserWeeklyAttachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'logged_in_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the profile associated with the user.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the week 1 associated with the user.
     */
    public function week1(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 1);
    }

    /**
     * Get the week 2 associated with the user.
     */
    public function week2(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 2);
    }

    /**
     * Get the week 3 associated with the user.
     */
    public function week3(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 3);
    }

    /**
     * Get the week 4 associated with the user.
     */
    public function week4(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 4);
    }

    /**
     * Get the week 5 associated with the user.
     */
    public function week5(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 5);
    }

    /**
     * Get the week 6 associated with the user.
     */
    public function week6(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 6);
    }

    /**
     * Get the week 7 associated with the user.
     */
    public function week7(): HasOne
    {
        return $this->hasOne(UserWeeklyAttachment::class)
                    ->where('week_number', 7);
    }
}
