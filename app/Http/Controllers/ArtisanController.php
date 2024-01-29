<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function artisanOptimize(){

        $exitcode = Artisan::call('config:clear');
        $exitcode = Artisan::call('route:clear');

        $exitcode = Artisan::call('optimize:clear');

        echo "OK";
    }

    public function artisanClear(){

        $exitcode = Artisan::call('config:clear');
        $exitcode = Artisan::call('cache:clear');
        //$exitcode = Composer::call;

        echo "OK";
    }

}
