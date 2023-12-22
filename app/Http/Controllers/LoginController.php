<?php

namespace App\Http\Controllers;

use App\Models\User;
use \Firebase\JWT\JWT;
use App\Models\AppInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{
    public function getTtl():int{
        return 60;
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

        if (auth()->validate($credentials)) {
        }

        $credentials = request(['email', 'password']);

        //if (! $token = auth()->attempt($credentials)) {
        //    return response()->json(['error' => 'Unauthorized'], 401);
       // }
        $user = auth()->user();
        //$token = auth()->setTTL($this->getTtl())->attempt($credentials);

        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + $this->getTtl();
        //$exp = $iat + 60; // Test 1 minutes

        $payload = array(
            "iss" => "mediaoto",
            "aud" => "mobile",
            "sub" => "api",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $request['email'],
        );
        $token = JWT::encode($payload, $key, 'HS256');
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


        $email = $request['email'];
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + $this->getTtl();
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
        $version = trim($request['version']);

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

                // Update App
                $updateApp = AppInfo::updateOrInsert(
                    ['userid' => $user->id],
                    ['version' => $version, 'fcmtoken' => $fcmtoken, 'updated_at' => now()]
                );


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
