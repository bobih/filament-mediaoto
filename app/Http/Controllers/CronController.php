<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Leads;
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
        Log::info('Push Controller....');

        //get User
        Log::info('Get Push List');
        //$pushList = $this->getPushList();
        $pushList[] = (object) array('userid' => 51);

            foreach ($pushList as $list) {

                // Get User Info

                $user = User::where('id',$list->userid)->first();
                Log::info('Get UserInfo ' . $user->nama);
                echo  $user->nama;
                // get Configuration
                Log::info('Get Config from Invoice');
                $invoice = Invoice::where('userid', $user->id)->first();

                //get All leads
                Log::info('Get All Leads');
                $pushList = Leads::select('id')->where('brand', $user->brand);

                //get exception
                Log::info('Get Exception');
                $deliveryController = new DeliveryController();
                $exceptionList = $deliveryController->getExceptionList($user->id, $user->showroom);
                if (count($exceptionList) > 0) {
                    $pushList->whereNotIn('id', $exceptionList);
                }

                //Get Model fromConfig
                Log::info('Get Model From Config');
                if (isset($invoice->model)) {
                    //$idsArr = explode(',',$model);
                    $pushList->whereIn('model', $invoice->model);
                }
                $pushList->orderBy('create', 'desc');
                $pushList->first();

                Log::info($pushList->id);

                /*
                //Insert Prospek
                $insertProspek = $this->insertProspek($user->id, $pushList->id, $list->showroom);
                if (!$insertProspek->status() == 200) {
                    return response()->json(["Error" => "Save Failed"], 401);

                }

                // delete Prospek
                $deleteList = $this->deletePushList($list->pushid);
                if (!$deleteList->status() == 200) {
                    return response()->json(["Error" => "Save Failed"], 401);
                }

                // Push Notification
                $fcm = new FcmController();
                $title = '';
                $payload = json_encode(array("page" => "ProspectList", "requestData" => "1"));
                $msgType = '';

                $push = $fcm->sendPushNotification($list->fcmtoken, '', $payload);
                */

            }


        //save leads
        //remove from temp

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
