<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMailer;

class SendCVData extends Controller
{
    /**
     * Mask function
     */
    const MASK_MAIL = [
        'response' =>  "<div> <p> Hello, %s, I'm so grateful towards you for your email! 
        <br />
        By the way, your post has been successfully sent, 
        I will feedback you as soon as possible, 
        <br /> Thank you so much for reaching me out! </p></div>"
    ];
    /**
     * Send cv
     *
     * @param Request $request
     * @return void
     */
    public function send(Request $request)
    {
        $validator = $this->validator($request->all());

        if (!$validator->fails()) {
            $data = $request->all();

            Mail::to('emil.shari87@gmail.com')->send(new SendMailer($data));

            return response()->json([
                'success' => true,
                'data' => sprintf(self::MASK_MAIL['response'], $data['name']),
            ], 200);
        }
        return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
    }
    /**
     * Validator for cv determining
     *
     * @param array $data
     * @return void
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'context' => ['required', 'string', 'min:8'],
        ]);
    }
}
