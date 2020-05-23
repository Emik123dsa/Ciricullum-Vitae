<?php

namespace App\Http\Controllers\ApiController;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NuxtController extends Controller
{
    protected $auth;
    
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Index initialization
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    }

    public function logout()
    {
        $this->auth->invalidate();
    }
}
