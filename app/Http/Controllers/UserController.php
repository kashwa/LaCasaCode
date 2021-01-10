<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StatusRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        $tokenResult = $user->createToken('Lacasacode');

        return response()->json([
            'user_data' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_data' => $tokenResult->token
        ]);
    }

    public function handleStatus(StatusRequest $request)
    {
        $user = Auth::user();
        $status = $request->status;
        if ($request->phone != $user->phone)
            return response()->json(['error' => 'Bad request'], 401);

        // Update status to that user.
        $user->status = $status;
        $user->save();

        return response()->json(['data' => $user], 201);
    }
}
