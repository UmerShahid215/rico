<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $role = $user->getRoleNames()->first();
        // if ($role == 'customer') {
        //     $timeSlot = Auth::user()->timeSlot_1;
        //     dd($timeSlot);
        //     $time = Carbon::parse(Carbon::now('PST'))->addHour('1');
        //     $hourNow = $time->format('H');

        //     //            $endHour = Carbon::parse(Carbon::now('PST'))->addHour('9');
        //     //            $endHour = $endHour->format('h')+1; ($hourNow >= $timeSlot_hour[0]) ||

        //     $timeSlot_hour = explode('-', $timeSlot);
        //     if (((int)$hourNow >= (int)$timeSlot_hour[0]) &&  ($hourNow  <= $timeSlot_hour[1])) {
        //         //                dd($hourNow  , $timeSlot_hour[0] , $timeSlot_hour[1] );


        //         return view('welcome');
        //     } else {
        //         Auth::logout();
        //         return redirect('/login');
        //     }
        // }
        return view('welcome');
    }
}
