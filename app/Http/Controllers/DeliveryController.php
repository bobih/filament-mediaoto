<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Response;
use App\Models\User;
use App\Models\Prospek;
use App\Models\PushList;
use App\Models\PushTemp;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Filament\Notifications\Notification;


class DeliveryController extends Controller
{

    public function createPushList(string $userid): JsonResponse
    {

        if ($userid == '') {
            return response()->json(["message" => "No Available User"], 400);

        }

        $tanggal = strtotime("+1 day");
        $tanggal = date('Y-m-d', $tanggal);
        $startTime = '09:00:00';
        $endTime = '21:00:00';
        // Set the number of days to generate timestamps for
        $numberOfDays = 90;
        $dailypush = 3;

        // Generate x random timestamps for each day in the next 30 days
        for ($day = 0; $day < $numberOfDays; $day++) {
            $date = date('Y-m-d', strtotime("+$day day", strtotime($tanggal)));

            // total Push daily
            for ($y = 0; $y < $dailypush; $y++) {
                $data[]['tanggal'] = $this->randomTimestamp("$date $startTime", "$date $endTime");
            }
        }

        // get Push Temp
        $tempList = PushTemp::where('userid', $userid)->get();

        if (count($tempList) == 0) {
            return response()->json("Please Generate List", 400);
        }

        $x = 0;
        foreach ($tempList as $list) {
            $pushModel = new PushList();
            $pushModel->userid = $userid;
            $pushModel->leadsid = $list->leadsid;
            $pushModel->tanggal = $data[$x]['tanggal'];
            $pushModel->save();
            $x++;
        }
        $deleteTemp = PushTemp::where('userid', $userid);
        $deleteTemp->delete();
        return response()->json(["message" => "Data Updated"], 200);
    }


    private function randomTimestamp($startTime, $endTime)
    {
        $startTimestamp = strtotime($startTime);
        $endTimestamp = strtotime($endTime);
        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);
        return date('Y-m-d H:i:s', $randomTimestamp);
    }


    public function getExceptionList($userid, $showroom): array
    {

        $arrException = [];
        $arruserid = [];
        // Get list User from showroom
        $listUser = DB::table('prospek')->select(DB::raw('distinct(userid)'));
        $listUser->where('showroom', $showroom);



        foreach ($listUser->get() as $user) {
            $arruserid[] = $user->userid;
        }


        //Notification::make()->danger()->title('total User (' . count($arruserid) . ')')->icon('heroicon-o-check')->send();

        $listLeads = DB::table('prospek')->select('leadsid');

        $listLeads->whereIn('leadsid', $arruserid);

        if ($listLeads->count() > 0) {
            foreach ($listLeads->get() as $lead) {
                $arrException[] = $lead->leadsid;
            }
        }

        $listPush = DB::table('push_list')->select('leadsid')->whereIn('userid', $arruserid);
        if ($listPush->count() > 0) {
            foreach ($listPush->get() as $push) {
                $arrException[] = $push->leadsid;
            }
        }


        return $arrException;

    }


}
