<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\V1\Option;
use App\Models\V1\TelegramLink;
use App\Models\V1\UserProfile;
use App\Models\V1\UserWeeklyAttachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'telegram_link_id',
        'name',
        'email',
        'password',
        'email_verified_at',
        'is_admin',
        'telegram_link_url',
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
        'logged_in_at' => 'datetime',
    ];

    /**
     * Get the profile associated with the user.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the weekly attachments associated with the user.
     */
    public function weeklyAttachments(): HasMany
    {
        $start_datetime = Option::where('name', 'start_datetime')->first()?->value;
        $end_datetime = Option::where('name', 'end_datetime')->first()?->value;

        return $this->hasMany(UserWeeklyAttachment::class)
                    ->when($start_datetime && $end_datetime, function ($query) use($start_datetime, $end_datetime) {
                        $query->whereDate('created_at', '>=', $start_datetime)
                                ->whereDate('created_at', '<=', $end_datetime);
                    })
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Get the telegram link associated with the user.
     */
    public function telegramLink(): BelongsTo
    {
        return $this->belongsTo(TelegramLink::class);
    }
}
