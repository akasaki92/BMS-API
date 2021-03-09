<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'emailVerify']]);
    }
    
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'bail|required|alpha_dash|unique:users',
            'name' => 'bail|required',
            'email' => 'bail|required|unique:users',
            'tgl_lahir' => 'bail|required|date',
            'avatar' => 'bail|required',
            'password' => 'bail|required|confirmed'
        ]);

        try {
            $user = new User;
            $user->username = $request->input('username');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->tgl_lahir = $request->input('tgl_lahir');
            $user->avatar = $request->input('avatar');
            $user->password = app('hash')->make($request->input('password'));
            $user->save();
            return response()->json([
                'entity' => 'users', 
                'action' => 'create', 
                'result' => 'success'
            ], 200);
        }
        catch (Exception $e) {
            return response()->json([
                'entity' => 'users', 
                'action' => 'create', 
                'result' => 'failed',
            ], 500);
        }

    }

    public function emailRequestVerification(Request $request)
    {
        if ( $request->user()->hasVerifiedEmail() ) {
            return response()->json('Email address is already verified.');
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json('Email request verification sent to '. Auth::user()->email);
    }

    public function emailVerify(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
        ]);
        JWTAuth::getToken();
        JWTAuth::parseToken()->authenticate();

        if ( ! $request->user() ) {
            return response()->json('Invalid token', 401);
        }
        
        if ( $request->user()->hasVerifiedEmail() ) {
            return response()->json('Email address '.$request->user()->getEmailForVerification().' is already verified.');
        }
        $request->user()->markEmailAsVerified();
        return response()->json('Email address '. $request->user()->email.' successfully verified.');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only(['username', 'password']);
        if (! $token = Auth::attempt($credentials)) {			
            return response()->json([
            'result' => 'failed',
            'message' => 'Unauthorized'
            ], 401);
        }
        return response()->json([
            'result' => 'success',
            'data' => $this->respondWithToken($token)
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['result' => 'success'], 200);
    }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }
}
