<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWeeklyAttachmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'user_weekly_attachments',
            'attributes' => [
                'weight' => $this->weight,
                'description' => $this->description,
                'week_number' => $this->week_number,
                'user_weekly_attachment_details' => $this->weeklyAttachmentDetails()->get(),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at
            ]
        ];
    }
}
