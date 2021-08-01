<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class SupervisorController extends Controller
{
    public function listing()
    {

        $curr_user = 'Super Visor';
        $canSelect = 'Semi Admin';
        $filterRole = 'manager';
        $curr_user_permission = 'supervisor';
        $data = User::whereHas("roles", function ($q) use ($curr_user_permission) {
            $q->where("name", $curr_user_permission);
        })->get();
        $count = count($data);
        return view('managers.index', compact('data', 'count', 'canSelect', 'curr_user', 'curr_user_permission', 'filterRole'));
    }

    public function superVisorView()
    {
        return view('managers.add-supervisor');
    }

    public function saveSuperVisor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "f_name" => 'required',
            "l_name" => 'required',
            "contact_number" => 'required|digits_between:8,11',
            "email" => 'required|email|unique:users',
            "time_slots" => 'required',
            "profile_avatar" => 'required',
            "password" => 'required|min:6|same:password_confirmation',
            "password_confirmation" => 'min:6'

        ]);
        if ($validator->fails()) {
            return Redirect::to(URL::previous())->withInput()->with('Error', $validator->messages()->first());
        }

        $store = User::create([
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "company_name" => $request->company_name,
            "phone_number" => $request->contact_number,
            "email" => $request->email,
            "company_site" => $request->company_site,
            "username" => $request->username,
            "language" => $request->language,
            "time_zone" => $request->time_zone,
            "communication_by" => $request->communication_by,
            "password" => bcrypt($request->password),
        ]);
        $file = $request->profile_avatar;
        if ($file) {
            $imageName = time() . '.' . request()->profile_avatar->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);
            $destination_path = 'images/';
            $file_path = $destination_path . $imageName;
            $store->profile_picture = $file_path;
            $store->save();
        }
        $data = $request->time_slots;
        if ($data == '9am-6pm') {
            $store->timeSlot_1 = $data;
        } elseif ($data == '10am-7pm') {
            $store->timeSlot_2 = $data;
        } else {
            $store->timeSlot_3 = $data;
        }
        $store->save();
        if ($store) {
            return Redirect::to(URL::previous())->with('Success', 'Supervisor Added Successfully');
        } else {
            return Redirect::to(URL::previous())->with('Error', 'Failed To Add Supervisor');
        }
    }
}
