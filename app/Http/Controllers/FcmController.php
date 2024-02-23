<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FcmWeb;
use App\Models\AppInfo;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;


class FcmController extends Controller
{

    public function setToken(Request $request){


        $input      = $request->all();
        $fcmtoken   = $input['fcmtoken'];
        $fcmstore   = $input['fcmstore'];

        $agent = new Agent();
        $platform = $agent->platform();


        if($fcmtoken == ''){
            return Response::json([
                'message' => 'Token :' . $fcmtoken
            ], 201);
        } else {
            try{

                if($fcmstore == ''){
                    // Save Data
                    $fcmweb = new FcmWeb();
                    $fcmweb->fcmtoken = $fcmtoken;
                    $fcmweb->platform = $platform;
                    $fcmweb->created_at = Carbon::now();
                    $fcmweb->save();
                    return Response::json([
                        'message' =>  "OK"
                    ], 201);
                } else {
                    $fcmweb = FcmWeb::where('fcmtoken',$fcmstore)->first();
                    $fcmweb->fcmtoken = $fcmtoken;
                    $fcmweb->update();
                    return Response::json([
                        'message' => "OK"
                    ], 201);
                }


            } catch (\Exception $e){
                return Response::json([
                    'message' => $e
                ], 201);
            }
        }

    }

    public function sentNews(){
        $userToken = 'd0tp1uAenpDIqCYNaZSQXj:APA91bEXi75jI3JTUwVtE-xZJznEkox-fxaJ45pLTSOJUvBiuYWcfndp2BHAgkPwyXX4oJUGyhFWp1gaInhX6OW7BYLCKtBQ_4k6PdD3dOAp6RNEcW1a382TVPbvwh0T1Z-cUvpOgLeL';

        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAnXAErDs:APA91bFNBiYEq7DtFkzdk80XjuKKL-Th5hukyDzTBKRW4VbxFVcYHs2_blwTZaliuKA5xvvA3iBbwvZxnr4dGYYdaysX9Sd4J46PGECiGLqlwpNRODrIINMpAfXLmSCHfnnQNfn8W4aq";




        $params = array(

            "title" => 'Mediaoto News',
            "body" => "Ini Produk yang Kena Recall Toyota di Tahun 2024",
            "icon" => 'https://www.mediaoto.id/images/white_logo.png',
            "color" => '',
            "sound" => '',
            "LinkUrl" => "https://www.mediaoto.id/news/ini-produk-yang-kena-recall-toyota-di-tahun-2024-cek-mobil-kalian",
            "tag" => 'tag',
            "click_action" => 'https://www.mediaoto.id/news/ini-produk-yang-kena-recall-toyota-di-tahun-2024-cek-mobil-kalian',
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
        $payload = '';
        $data = array(
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default",
            "status" => "done",
            "screen" => $payload,

        );

        $webpush = array(
            "headers" => array(
                "image" => "https://www.mediaoto.id/images/44/conversions/01HPM67AABJ3JFESAJNJV6QYZ6-webpthumbnomark.webp"
            ),
        );

        $android = array(
            "notification" => array (
                "image" =>"https://www.mediaoto.id/images/44/conversions/01HPM67AABJ3JFESAJNJV6QYZ6-webpthumbnomark.webp"
                )
            );

        $apns = array(
            "payload" => array(
                "aps" => array(
                  "mutable-content" => 1
                    ),
                ),
                "fcm_options" => array(
                    "image" =>"https://www.mediaoto.id/images/44/conversions/01HPM67AABJ3JFESAJNJV6QYZ6-webpthumbnomark.webp"
                ),
            );

          $message = array(
            "topic" => "industry-tech",
            "notification" => array(
                "icon"      => "https://www.mediaoto.id/images/white_logo.png",
                "title"     => "Mediaoto News",
                "body"      => "Ini Produk yang Kena Recall Toyota di Tahun 2024",
                "click_action"   => "https://www.mediaoto.id/news/ini-produk-yang-kena-recall-toyota-di-tahun-2024-cek-mobil-kalian",
                "image"     => "https://www.mediaoto.id/images/44/conversions/01HPM67AABJ3JFESAJNJV6QYZ6-webpthumbnomark.webp"
            ),
//            "android" => $android,
//            "apns"  => $apns,
//            "webpush" => $webpush,
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

    public function sentContactUs($request){

        $fcmweb = FcmWeb::where('id',1)->first();

        //$userToken = "e28hxY1XmkwUMUU2ITOdHj:APA91bH0FWU1iKNXdjn3fZK76odmaQCITZp6inlFyVf_HgCFtOHYTzBQzfDPsnMIe-mXBeat4byEX7y0Nz1x94EJSmB9u3yQrkuaiFZxEMHeiDyfeFrT-AP4SqHhxVminrHoaP9fBYf8";
        $userToken = $fcmweb->fcmtoken;

        $body  = $request['name'] ."\n";
        $body .= $request['email']."\n";
        $body .= $request['phone']."\n";
        $body .= $request['notes'];
       // $message = "Nama:" . $request->name . " Email: " . $request->email. "";
        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAnXAErDs:APA91bFNBiYEq7DtFkzdk80XjuKKL-Th5hukyDzTBKRW4VbxFVcYHs2_blwTZaliuKA5xvvA3iBbwvZxnr4dGYYdaysX9Sd4J46PGECiGLqlwpNRODrIINMpAfXLmSCHfnnQNfn8W4aq";

          $message = array(
            "topic" => "industry-tech",
            "notification" => array(
                "icon"      => "https://www.mediaoto.id/images/white_logo.png",
                "title"     => "New Contact Request",
                "body"      => $body,
                "click_action"   => "https://www.mediaoto.id",

            ),
//            "android" => $android,
//            "apns"  => $apns,
//            "webpush" => $webpush,
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
}
