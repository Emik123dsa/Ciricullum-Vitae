<?php
namespace App\Http\Controllers\ApiController\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $auth;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return response()->json([
                'success' => false,
                'errors' => 'You have been trying to make a lot of attempts | Locked Out'
            ]);
        }
        $this->incrementLoginAttempts($request);

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = $this->auth->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'data' => 'Unauthorized'
                ], 422);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'data' => 'Invalid credentials ' . $e
            ], 422);
        }

        return $this->respondWithToken($token, $request);
    }

    protected function respondWithToken($token, $request)
    {
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'data' => $request->user(),
            'expires_in' => auth()->factory()->getTTL() * 60 * 24,
        ], 200);
    }
}
