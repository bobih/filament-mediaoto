<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Firebase\JWT\JWT;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function getUserInfo(Request $request)
    {

        $userid = $request['userid'];
        if (is_null($userid)) {
            return response()->json(["Error" => "User Not Found"], 401);
        }

        $query = DB::table('users')->where('id', $userid)->get();

        $data = [];
        $x = 0;
        foreach ($query as $rows) {
            if ($rows->quota == 0) {
                $rows->quota = "0";
            }
            $data[$x]['id'] = $rows->id;
            $data[$x]['nama'] = trim(ucwords($rows->nama));
            $data[$x]['email'] = $rows->email;
            $data[$x]['phone'] = $rows->phone;
            $data[$x]['quota'] = $rows->quota; // $rows->phone'];
            $data[$x]['alamat'] = $rows->alamat;
            $data[$x]['lokasi'] = $rows->lokasi;
            $data[$x]['ktp'] = $rows->ktp;
            $data[$x]['npwp'] = $rows->npwp;
            $data[$x]['image'] = $rows->image;
            $data[$x]['fcmtoken'] = $rows->fcmtoken;
            $data[$x]['register'] = $rows->created_at;

            $key = "bobihaja";// getenv('JWT_SECRET');
            $iat = time(); // current timestamp value
            $exp = $iat + 36000;

            $payload = array(
                "iss" => "mediaoto",
                "aud" => "mobile",
                "sub" => "api",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "email" => $rows->email,
            );

            $token = JWT::encode($payload, $key, 'HS256');
            $data[$x]['token'] = $token;

            switch ($rows->acctype) {
                case 2:
                    $data[$x]['acctype'] =  'SILVER';
                    break;
                case 3:
                    $data[$x]['acctype'] =  'GOLD';
                    break;
                case 4:
                    $data[$x]['acctype'] =  'DIAMOND';
                    break;
                default:
                $data[$x]['acctype'] =  'BRONZE';
            }


            $x++;

        }

        array_walk_recursive($data, function (&$item) {
            $item = strval($item);
        });
        return response()->json($data, 200);
    }


    public function updateImage(Request $request)
    {

        //return response()->json($request->all(), 200);

        /*
        $request->validate([
            'userid' => 'required',
            'nama' => '',
            'phone' => '',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        */



        $userid = trim($request['userid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nama = trim($request['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $oldfilename = trim($request['oldfilename'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = trim($request['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alamat = trim($request['alamat'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);



        $file = $request->file('file');

        // Check if is image
        $extensions = ['jpeg','png','jpg','gif','svg','webp'];
        $originalExtention = $request->file('file')->getClientOriginalExtension(); // the extension of file .
        if (!in_array($originalExtention , $extensions)){
            return response()->json(["Error" => "Update Failed"], 401);
        }

        $fileName = time() . '.' . $file->extension();
        $saveFile = $request->file->storeAs('public/images', $fileName);


        $user = User::where('id', $userid)->first();

        $user->nama = $request->input('nama');
        $user->phone = trim($request->input('phone'));
        $user->alamat = trim($request->input('alamat'));
        $user->image = $fileName;

        $user->save();
        return response()->json("OK", 200);


    }

    public function updateUserInfo(Request $request)
    {
        $affected = User::where('id', $request['userid'])
            ->update([
                'nama' => $request['nama'],
                'phone' => $request['phone'],
                'alamat' => $request['alamat']
            ]);

        if ($affected == 1) {
            return response()->json(["message" => "Data Updated"], 200);
        } else {
            return response()->json(["Error" => "Update Failed"], 401);
        }
    }

    public function changePassword(Request $request)
    {

       // $userModel = new User();

        $userid = $request['userid'];
        $oldPassword = trim($request['oldpassword']);
        //$oldPassword  = password_hash(trim($this->request->getVar('oldpassword')), PASSWORD_DEFAULT);
        $newPassword = password_hash(trim($request['newpassword']), PASSWORD_DEFAULT);

        $user = User::where('id', $userid)->first();
        $pwd_verify = password_verify($oldPassword, $user['password']);

       // $db = db_connect();

        if ($pwd_verify) {
            $affected = $user->update(['password' => $newPassword]);
            if ($affected == 1) {
                return response()->json(["message" => "Data Updated"], 200);
            } else {
                return response()->json(["Error" => "Update Failed"], 401);
            }
        } else {
            return response()->json(["Error" => "Check Your Password"], 401);
        }
    }
}
