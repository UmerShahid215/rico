<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function update(Request $request)
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
