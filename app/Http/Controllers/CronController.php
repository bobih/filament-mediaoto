<?php

namespace App\Http\Controllers;

use App\Models\Prospek;
use App\Models\PushList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronController extends Controller
{

    public function pushData(Request $request)
    {

        // Get PushList
        $pushList = $this->getPushList();
            /*
            echo "<pre>";
            print_r($pushList);
            echo "<pre>";
            */

        foreach ($pushList as $list) {

            //echo "<br />" . $list->pushid;

            $insertProspek = $this->insertProspek($list->userid,$list->leadsid,$list->showroom);
            if(!$insertProspek->status() == 200){
                return response()->json(["Error" => "Save Failed"], 401);
            }

            /*
            // delete Prospek
            $deleteList = $this->deletePushList($list->pushid);
            if(!$deleteList->status() == 200){
                return response()->json(["Error" => "Save Failed"], 401);
            }

            // Push Notification
            $fcm = new FcmController();
            $title = '';
            $payload = json_encode(array("page" => "ProspectList", "requestData" => "1"));
            $msgType = '';

           // $push = $fcm->sendPushNotification($list->fcmtoken, '', $payload);
            */
        }
        //return response()->json(["Success" => "push Success"], 200);
    }


    private function insertProspek(string $userid, string $leadsid, string $showroom) : Response
    {

        $prospek = new Prospek();
        $prospek->userid = $userid;
        $prospek->leadsid = $leadsid;
        $prospek->showroom = $showroom;
        $prospek->created_at = now();
        $prospek->updated_at = now();

        $affected = $prospek->save();

        if ($affected == 1) {
            return response()->json(["message" => "Save Success"], 200);
        } else {
            return response()->json(["Error" => "Save Failed"], 401);
        }

    }


    private function deletePushList($pushid) : Response {

        $pusList = PushList::where('id',$pushid);
        $affected = $pusList->delete();
        if ($affected == 1) {
            return response()->json(["message" => "Data Deleted"], 200);
        } else {
            return response()->json(["Error" => "Delete Failed"], 401);
        }
    }


    public function getPushList()
    {
        $tanggal = date('Y-m-d H:i');
        /*
        $pushlist = PushList::select(DB::raw('push_list.id as pushid'), 'users.showroom', 'users.fcmtoken', 'push_list.userid', 'push_list.leadsid')
            ->leftJoin('users', 'users.id', 'push_list.userid')
            ->where(DB::raw('DATE_FORMAT(push_list.tanggal,"%Y-%m-%d %H:%i"'), $tanggal);
        */

            $pushlist = PushList::select(DB::raw('push_list.id as pushid'), 'users.showroom', 'users.fcmtoken', 'push_list.userid', 'push_list.leadsid')
            ->leftJoin('users', 'users.id', 'push_list.userid')
            ->where(DB::raw('DATE_FORMAT(push_list.tanggal,"%Y-%m-%d %H:%i")'),'>', $tanggal)
            ->limit(10);

        return $pushlist->get();
    }
}
