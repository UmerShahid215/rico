<?php

namespace App\Http\Controllers\SemiAdmin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class SemiAdminController extends Controller
{
    public function listing()
    {
        $curr_user = 'Semi Admin';
        $curr_user_permission = 'manager';
        $filterRole = '0';
        $canSelect = 'Admin';

        $data = User::whereHas("roles", function ($q) use ($curr_user_permission) {
            $q->where("name", $curr_user_permission);
        })->get();
        $count = count($data);
        return view('managers.index', compact('data', 'count', 'canSelect', 'curr_user', 'filterRole', 'curr_user_permission'));
    }
    public function addSemiAdmin($role = '', $type = '', $filerRole = false)
    {
        //        dd($role);
        $user_type = $type;
        $user_permission = $role;
        $users = false;
        if ($filerRole) {
            $users = User::whereHas("roles", function ($q) use ($filerRole) {
                $q->where("name", $filerRole);
            })->get();

            if (count($users) == 0) {
                $users = false;
            }
        }
        //        dd($users);
        return view('add', compact('user_type', 'user_permission', 'users', 'type'));
    }
    public function storeSemiAdmin(Request $request)
    {


        if ($request['profile_picture']) {
            $ext = explode('/', mime_content_type($request['profile_picture']))[1];
            $img = $request['profile_picture'];
            $file_name = 'image_' . time() . '.jpg';
            @list($type, $img) = explode(';', $img);
            @list(, $img)      = explode(',', $img);
            if ($img != "") {
                \Storage::disk('public')->put($file_name, base64_decode($img));
                File::move(storage_path() . '/app/public/' . $file_name, 'assets/media/users/' . $file_name);
                $request['profile_picture'] = $file_name;
            }
        } else {
            $request['profile_picture'] = NULL;
        }

        $request['password'] = Hash::make($request['password']);

        //        dd($request->all());
        $user =  User::create($request->all());

        $user->assignRole($request->user_permission);
        return redirect()->back();
    }
}
