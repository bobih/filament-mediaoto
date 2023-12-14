<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Province;
use DB;

class PaketController extends Controller
{

 public function getQuota(Request $request){


	$request = $request->get('query');
    $q = DB::table('list_paket')->where('id', $request)->get(['id', DB::raw('quota as text')]);
    //$q = DB::table('list_paket')->where('id',1)->get(['id', DB::raw('quota as text')]);

    return $q;
}

}
