<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $rules = [
            'nama' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
          ];

          $messages = [
            'required'  => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
            'email'     => 'Invalid email'
          ];

          //$request->validate($rules,$messages);

          /*
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);
        */

        $validator = Validator::make($request->all(),$rules, $messages );

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        User::create([
            'email' => trim($request['email']),
            'nama' => trim($request['nama']),
            'fcmtoken' => trim($request['fcmtoken']),
            'password' => password_hash(trim($request['password']), PASSWORD_DEFAULT)
        ]);

        // Sent Notif to admin

        $fcm = new FcmController();
        $title = 'User Register';
        $message =  trim($request['nama']) . ' ('.trim($request['email']).')';
         $sentNotif = $fcm->sendMessage(36,$title,$message);

        if($sentNotif->status() == 200){

        return response()->json(["message" => "Data Updated"], 200);
        }else {
            return response()->json(["message" => $sentNotif->getData()], 400);

        }

    }
}
