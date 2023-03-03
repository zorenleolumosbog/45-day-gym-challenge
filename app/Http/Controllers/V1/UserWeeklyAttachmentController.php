<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserWeeklyAttachmentRequest;
use App\Http\Resources\V1\UserWeeklyAttachmentResource;
use App\Models\V1\UserWeeklyAttachment;
use Illuminate\Http\Request;

class UserWeeklyAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_weekly_attachments = UserWeeklyAttachment::
                orderBy('created_at', 'desc')
                ->paginate($request->limit ? $request->limit : UserWeeklyAttachment::count());
        
        return UserWeeklyAttachmentResource::collection($user_weekly_attachments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserWeeklyAttachmentRequest $request)
    {
        $user_weekly_attachment = UserWeeklyAttachment::create([
            'user_id' => $request->user_id,
            'weight' => $request->weight,
            'description' => $request->description,
            'week_number' => $request->week_number
        ]);

        return new UserWeeklyAttachmentResource($user_weekly_attachment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserWeeklyAttachment  $user_weekly_attachment
     * @return \Illuminate\Http\Response
     */
    public function show(UserWeeklyAttachment $user_weekly_attachment)
    {
        return new UserWeeklyAttachmentResource($user_weekly_attachment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserWeeklyAttachment  $user_weekly_attachment
     * @return \Illuminate\Http\Response
     */
    public function update(UserWeeklyAttachmentRequest $request, UserWeeklyAttachment $user_weekly_attachment)
    {
        $user_weekly_attachment ->update([
            'weight' => $request->weight,
            'description' => $request->description,
            'week_number' => $request->week_number
        ]);

        return new UserWeeklyAttachmentResource($user_weekly_attachment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserWeeklyAttachment $user_weekly_attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWeeklyAttachment $user_weekly_attachment)
    {
        $user_weekly_attachment->delete();
        
        return response(null, 204);
    }
}
