<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::
                orderBy('created_at', 'desc')
                ->paginate($request->limit ? $request->limit : User::count());
        
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return response(null, 204);
    }

    /**
     * Login the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::with('profile')->find($request->user()->id);

        $user->update([
            'logged_in_at' => Carbon::now()
        ]);
        
        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Logout the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // Get the access token for the current user
        $access_token = Auth::user()->token();

        // Retrieve the access token ID
        $token_id = $access_token->id;

        $token_repository = app(TokenRepository::class);
        $refresh_token_repository = app(RefreshTokenRepository::class);
        
        // Revoke an access token...
        $token_repository->revokeAccessToken($token_id);
        
        // Revoke all of the token's refresh tokens...
        $refresh_token_repository->revokeRefreshTokensByAccessTokenId($token_id);

        return response(null, 204);
    }
}
