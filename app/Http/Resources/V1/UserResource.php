<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'users',
            'attributes' => [
                'name' => $this->name,
                'is_admin' => $this->is_admin,
                'user_profile' => $this->userProfile()->first() ? 
                                    $this->userProfile()->first()->makeHidden(['deleted_at']) :
                                    null,
                'logged_in_at' => $this->logged_in_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]
        ];
    }
}
