<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Form;
use App\Models\Notification;


class PageController extends Controller
{
    public function dashboard()
    {
        $totalSupervisors = User::role('supervisor')->count();

        $totalManagers =0;

        $totalEmployees = User::role('customer')->count();

        $totalForms  = Form::count();

        $employees = User::role('customer')->withCount('employeeForms')->orderBy('employee_forms_count', 'desc')->limit(5)->get(['id', 'username', 'created_at']);

        $forms = Form::latest()->limit(5)->get();


        $notifications = Notification::latest()->limit(5)->get();



        return view('admin.dashboard', compact(['totalSupervisors', 'totalManagers', 'totalEmployees', 'employees', 'totalForms', 'notifications', 'forms']));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

   
    public function getAdmin($id)
    {
        $user = User::find($id);
        return Response::json($user);
    }

    public function update(Request $request)
    {
        $user = user::where('type',1)->update([
        
        'f_name' => $request->input('f_name'),
        'f_name' => $request->input('f_name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->password),
    ]);

    if($request->hasfile('profile_pic')){

        $file = $request->file('profile_pic');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.' .$extension;
        $file->move('upload/image/', $filename);
        $user->profile_pic = $filename;
    }
    $user->save();

        return response()->json(['success'=>'Admin update successfully.']);
    }


    public function ss(Request $request)
    {
       
        $data = $request->validate([
            'username' => ['required', 'string'],
            'dob' => ['nullable'],
            'phone_number' => ['nullable', 'string'],
        ]);
            
        Auth::user()->update($data);

        return redirect()->route('admin.profile');
    }
}
