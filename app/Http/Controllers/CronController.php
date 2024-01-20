<?php

namespace App\Http\Controllers;

use App\Models\Prospek;
use App\Models\PushList;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class CronController extends Controller
{

    public function pushData(Request $request)
    {

        Log::info('Loading Home.');

    }

    public function pushData2(Request $request)
    {
        $enableCrond = (bool) env('CROND', false);

        if ($enableCrond) {
            // Get PushList
            $pushList = $this->getPushList();
            foreach ($pushList as $list) {

                $insertProspek = $this->insertProspek($list->userid, $list->leadsid, $list->showroom);
                if (!$insertProspek->status() == 200) {
                    return response()->json(["Error" => "Save Failed"], 401);

                }
                // delete Prospek
                $deleteList = $this->deletePushList($list->pushid);
                if (!$deleteList->status() == 200) {
                    return response()->json(["Error" => "Save Failed"], 401);
                }
                //echo "<br /> Success Delete ID : " . $list->leadsid;
                // Push Notification
                $fcm = new FcmController();
                $title = '';
                $payload = json_encode(array("page" => "ProspectList", "requestData" => "1"));
                $msgType = '';

                $push = $fcm->sendPushNotification($list->fcmtoken, '', $payload);
                // echo "<br /> Success Push : " . $list->leadsid;
            }
        }
        //return response()->json(["Success" => "push Success"], 200);
    }


    private function insertProspek(string $userid, string $leadsid, string $showroom): JsonResponse
    {
        try {
            $prospek = new Prospek();
            $prospek->userid = $userid;
            $prospek->leadsid = $leadsid;
            $prospek->showroom = $showroom;
            $prospek->created_at = now();
            $prospek->updated_at = now();
            $prospek->save();
            return response()->json(["message" => "Save Success"], 200);
        } catch (QueryException $e) {
            return response()->json(["Error" => "Save Failed"], 401);
        }
    }

    private function deletePushList($pushid): JsonResponse
    {
        try {
            $pusList = PushList::where('id', $pushid);
            $pusList->delete();
            return response()->json(["message" => "Data Deleted"], 200);
        } catch (QueryException $e) {
            return response()->json(["Error" => "Delete Failed"], 401);
        }
    }

    public function getPushList()
    {
        $tanggal = date('Y-m-d H:i');
        $pushlist = PushList::select(DB::raw('push_list.id as pushid'), 'users.showroom', 'users.fcmtoken', 'push_list.userid', 'push_list.leadsid')
            ->leftJoin('users', 'users.id', 'push_list.userid')
            ->where(DB::raw('DATE_FORMAT(push_list.tanggal,"%Y-%m-%d %H:%i")'), "<=", $tanggal);
        return $pushlist->get();
    }
}
