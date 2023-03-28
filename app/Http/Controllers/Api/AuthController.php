<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     return response()->json([
        //         'message' => "Neautorizovan pristup"
        //     ], 401);
        // }

        // $user = User::where('email', $request['email'])->firstOrFail();

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'message' => 'Dobrodosli' . $user->name,
        //     'access_token' => $token,
        //     'token_type' => 'Bearer'
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }
        else{
            $user = User::where('email', $request->email)->first();

            if(! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid Credentials',
                ]);
            }
            else {
                if($user->role_as == 1){
                    $role = 'isApiAdmin';
                    $token = $user->createToken($user->email.'_AdminToken', ['server:admin'])->plainTextToken;
                }
                else {
                    $role = '';
                    $token = $user->createToken($user->email.'_Token', [''])->plainTextToken;
                }

                return response()->json([
                 'status' => 200,
                 'username' => $user->name,
                 'token' => $token,
                 'message' => 'Logged in Successfully',
                 'role' => $role
             ]);
            }
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Uspesno ste se izlogovali!'
        ];
    }
}
