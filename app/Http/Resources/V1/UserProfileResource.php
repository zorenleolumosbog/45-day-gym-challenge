<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'type' => 'user_profiles',
            'attributes' => [
                'user_id' => (string) $this->user_id,
                'age' => $this->age,
                'height' => $this->height,
                'weight' => $this->weight,
                'gym_experience' => $this->gym_experience,
                'hours_of_sleep_at_night' => $this->hours_of_sleep_at_night,
                'stress_level_out_of_10' => $this->stress_level_out_of_10,
                'medications_supplements' => $this->medications_supplements,
                'injuries_illnesses' => $this->injuries_illnesses,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]
        ];
    }
}
