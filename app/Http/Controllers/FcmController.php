<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FcmWeb;
use App\Models\AppInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;

class FcmController extends Controller
{

    public function setToken(Request $request){
        $fcmtoken = trim($request['fcmtoken']);
        if($fcmtoken == ''){
        } else {

            $fcmweb = new FcmWeb();
            $fcmweb->fcmtoken = $fcmtoken;
            $fcmweb->created_at = Carbon::now();
            $fcmweb->save();
        }
        return "OK";
    }

    public function sendPushNotification($fcmtoken, $title, $payload)
    {
        $userToken = $fcmtoken;

        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAnXAErDs:APA91bFNBiYEq7DtFkzdk80XjuKKL-Th5hukyDzTBKRW4VbxFVcYHs2_blwTZaliuKA5xvvA3iBbwvZxnr4dGYYdaysX9Sd4J46PGECiGLqlwpNRODrIINMpAfXLmSCHfnnQNfn8W4aq";
        $params = array(

            "title" => 'Incoming Leads!',
            "body" => "Please Check Out",
            "icon" => '',
            "color" => '',
            "sound" => '',
            "tag" => 'tag',
            "click_action" => 'FLUTTER_NOTIFICATION_CLICK',
            "body_loc_key" => 'body_lock_key',
            "body_loc_args" => array(
                "body_loc"
            ),
            "title_loc_key" => 'title_loc',
            "title_loc_args" => array(
                'Title_loc'
            ),

        );


        //$payload = json_encode(array("page" => "ProspectDetail", "requestData" => "6"));
        $data = array(
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default",
            "status" => "done",
            "screen" => $payload,

        );

        $message = array(
            "notification" => $params,
            "data" => $data,
            "to" => $userToken,
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=" . $server_key,
                "Content-Type: application/json",
            ),
            CURLOPT_POSTFIELDS => json_encode($message),
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //curl_close($curl);
        //return $response;

        if ($response == false) {


            return curl_error($curl);
        } else {
            return "OK";
        }
    }

    public function sendWelcomeNotification(string $fcmtoken, string $title, string $payload, string $msgType)
    {
        /*
        $db = db_connect();
        $sql = "SELECT `fcmtoken` from `users` where `id`=36 LIMIT 1";
        $query = $db->query($sql)->getRow();

        $userToken = $query->fcmtoken;
        */
        $userToken = $fcmtoken;

        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAnXAErDs:APA91bFNBiYEq7DtFkzdk80XjuKKL-Th5hukyDzTBKRW4VbxFVcYHs2_blwTZaliuKA5xvvA3iBbwvZxnr4dGYYdaysX9Sd4J46PGECiGLqlwpNRODrIINMpAfXLmSCHfnnQNfn8W4aq";




        $params = array(

            "title" => 'Welcome to Mediaoto',
            "body" => "Paket Membership Gold anda telah Aktif",
            "icon" => '',
            "color" => '',
            "sound" => '',
            "tag" => 'tag',
            "click_action" => 'FLUTTER_NOTIFICATION_CLICK',
            "body_loc_key" => 'body_lock_key',
            "body_loc_args" => array(
                "body_loc"
            ),
            "title_loc_key" => 'title_loc',
            "title_loc_args" => array(
                'Title_loc'
            ),

        );




        //$payload = json_encode(array("page" => "ProspectDetail", "requestData" => "6"));
        $data = array(
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default",
            "status" => "done",
            "screen" => $payload,

        );

        $message = array(
            "notification" => $params,
            "data" => $data,
            "to" => $userToken,
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=" . $server_key,
                "Content-Type: application/json",
            ),
            CURLOPT_POSTFIELDS => json_encode($message),
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //curl_close($curl);
        //return $response;

        if ($response == false) {
            return curl_error($curl);
        } else {
            return "OK";

        }
    }

    public function sendMessage(int $userid, string $title, string $message): JsonResponse
    {
        if ($userid == '') {
            return response()->json(["message" => "Missing User"], 400);
        }

        $user = AppInfo::where('userid', $userid)->first();


        if (!$user) {
            return response()->json(["message" => "User Not Registered"], 400);
        }

        $userToken = $user->fcmtoken;

        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAnXAErDs:APA91bFNBiYEq7DtFkzdk80XjuKKL-Th5hukyDzTBKRW4VbxFVcYHs2_blwTZaliuKA5xvvA3iBbwvZxnr4dGYYdaysX9Sd4J46PGECiGLqlwpNRODrIINMpAfXLmSCHfnnQNfn8W4aq";

        $params = array(

            "title" => $title,
            "body" => $message,
            "icon" => '',
            "color" => '',
            "sound" => '',
            "tag" => 'tag',
            "click_action" => 'FLUTTER_NOTIFICATION_CLICK',
            "body_loc_key" => 'body_lock_key',
            "body_loc_args" => array(
                "body_loc"
            ),
            "title_loc_key" => 'title_loc',
            "title_loc_args" => array(
                'Title_loc'
            ),

        );




        $payload = '';
        $data = array(
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default",
            "status" => "done",
            "screen" => $payload,

        );

        $message = array(
            "notification" => $params,
            "data" => $data,
            "to" => $userToken,
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=" . $server_key,
                "Content-Type: application/json",
            ),
            CURLOPT_POSTFIELDS => json_encode($message),
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //curl_close($curl);
        //return $response;

        if ($response == false) {
            return response()->json(["Error" => curl_error($curl)], 400);
        } else {
            return response()->json(["message" => "Notif Success"], 200);
        }
    }
}
