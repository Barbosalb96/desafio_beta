<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class LoginController extends Controller
{
    /**
     * User login API method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) return response()->json(['Validation Error.' => $validator->errors()], 422);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => auth()->user(), 'access_token' => $accessToken]);

        } else {
            return response()->json(['Unauthorised' => ['error' => 'Unauthorised']], 401);
        }
    }

    /**
     * User registration API method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) return response()->json(['Validation Error.' => $validator->errors()], 422);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $success['name'] = $user->name;
            $message = 'Um usuário foi criado com sucesso.';
            $success['token'] = $user->createToken('accessToken')->accessToken;
        } catch (Exception $e) {
            $success['token'] = [];
            $message = 'Ops! Não foi possível criar um novo usuário.';
        }
        return response()->json([$success, $message], 200);
    }
}
