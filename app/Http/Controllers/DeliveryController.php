<?php

namespace App\Http\Controllers;

use DB;
use Response;
use App\Models\User;
use App\Models\PushList;
use App\Models\PushTemp;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeliveryController extends Controller
{

    public function createPushList(string $userid): JsonResponse
    {

        if ($userid == '') {
            return response()->json(["message" => "Data Updated"], 400);

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


}
