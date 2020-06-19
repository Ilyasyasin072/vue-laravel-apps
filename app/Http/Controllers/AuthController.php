<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

class AuthController extends Controller
{
    /*
        Register Api
    */
    public function register(Request $request) {

        $validation = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        /* statment login */

        if ($validation->fails()) {
            return response()->json([
                'status'    => 'error',
                'error'     => $validation->errors(),
            ], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );

        try {

            $user->save();
            return response()->json([
                'status' => 'success',
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /*
        Login Api
    */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    /*
        Get authenticated user
    */

    public function user(Request $request) {
        return "user";
    }

     /*
        Logout
    */

    public function logout() {
        return "logout";
    }

    /*
     * Refresh JWT token
     */

    public function refresh() {
        return "refresh";
    }

    /**
     * Return auth guard
     */

    private function guard()
    {
        return Auth::guard();
    }
}
