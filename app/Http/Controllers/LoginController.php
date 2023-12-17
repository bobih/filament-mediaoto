<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getTtl():int{
        return 3600;
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:4|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 401);
        }

        //$user = Auth::guard('api')->user();
       // $user = User::where('email', $request->email)->first();
        //$token = Auth::login($user);
        //$key = getenv('JWT_SECRET');
       // $newToken = auth()->refresh();
        //return response()->json(['error' => $token], 401);
        if (auth()->validate($credentials)) {
        }

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = auth()->user();
        $token = auth()->setTTL($this->getTtl())->attempt($credentials);



        /*
        $key = 'bobihaja'; getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 36000;
        $payload = array(
            "iss" => "mediaoto",
            "aud" => "mobile",
            "sub" => "api",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $request['email'],
        );
        $token = JWT::encode($payload, $key, 'HS256');

        //$credentials = $request->only('email', 'password');
        //$token = Auth::guard('api')->attempt($credentials);
        */

       //$token = Auth::guard('api')->login($user);


        $data = ['success' => true,
            'id' => $user->id,
            'token' => $token];
        array_walk_recursive($data, function (&$item) {
            $item = strval($item);
        });

        return response()->json($data, 200);

    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function refreshToken(Request $request)
    {

        /*
        $email = $request['email'];

        $user = User::where('email', $email)->first();

        if ($user == null) {
            return response()->json(["Error" => "User Not Found"], 200);
        }

        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
        //$exp = $iat + 60; // Test 1 minutes

        $payload = array(
            "iss" => "mediaoto",
            "aud" => "mobile",
            "sub" => "api",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $email,
        );


        $token = JWT::encode($payload, $key, 'HS256');
        */
        $token = auth()->setTTL($this->getTtl())->refresh();


        $response = [
            'message' => 'Refresh Succesful',
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function updateUser(Request $request)
    {
        $email = trim($request['email']);
        $fcmtoken = trim($request['fcmtoken']);

        if (is_null($email)) {
            $response = [
                'Error' => 'Invalid Email',
                'message' => 'Invalid Email'
            ];
            return response()->json($response, 401);
        }

        $user = User::where('email', $email)->first();
        if ($user == null) {
            $response = [
                'Error' => 'Invalid Email',
                'message' => 'Invalid Email'
            ];
            return response()->json($response, 401);
        } else {
            try {
                $user->update(['fcmtoken' => $fcmtoken]);
                $response = [
                    'message' => 'Update Success!'
                ];
                return response()->json($response, 401);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json($response, 401);
            }
        }
    }
}
