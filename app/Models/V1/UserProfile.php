<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'age',
        'height',
        'weight',
        'weight_loss_goal',
        'gym_experience',
        'hours_of_sleep_at_night',
        'stress_level_out_of_10',
        'medications_supplements',
        'injuries_illnesses'
    ];

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'age' => 'string',
        'weight' => 'string',
        'weight_loss_goal' => 'string',
        'hours_of_sleep_at_night' => 'string',
        'stress_level_out_of_10' => 'string',
    ];
}
