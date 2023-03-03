<?php

namespace App\Http\Resources\V1;

use App\Models\V1\UserWeeklyAttachment;
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
        $weekly_attachment = UserWeeklyAttachment::where('user_id', $this->id)->latest()->first();
        $weight_loss = 0;
        if($this->profile()->first() && $weekly_attachment) {
            $weight_loss = floatval($this->profile()->first()->weight) - floatval($weekly_attachment->weight);
        }

        return [
            'id' => $this->id,
            'type' => 'users',
            'attributes' => [
                'name' => $this->name,
                'weight_loss' => (string) $weight_loss,
                'is_admin' => $this->is_admin,
                'profile' => $this->profile()->first(),
                'week1' => $this->week1()->with('weeklyAttachmentDetails')->first(),
                'week2' => $this->week2()->with('weeklyAttachmentDetails')->first(),
                'week3' => $this->week3()->with('weeklyAttachmentDetails')->first(),
                'week4' => $this->week4()->with('weeklyAttachmentDetails')->first(),
                'week5' => $this->week5()->with('weeklyAttachmentDetails')->first(),
                'week6' => $this->week6()->with('weeklyAttachmentDetails')->first(),
                'week7' => $this->week7()->with('weeklyAttachmentDetails')->first(),
                'logged_in_at' => $this->logged_in_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at
            ]
        ];
    }
}
