<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $totalEmployees  = $user->employees()->count();


        $totalForms  = $user->employees_forms_count;


        $employees = $user->employees()->withCount('employeeForms')->orderBy('employee_forms_count', 'desc')->limit(5)->get();

        $forms = $user->forms()->limit(5)->get();

        $notifications = $user->notifications()->limit(5)->get();

        return view('supervisors.dashboard', compact(['totalEmployees', 'totalForms', 'employees', 'forms', 'notifications']));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('supervisors.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'f_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'dob' => ['nullable'],
            'phone_number' => ['nullable', 'string'],
        ]);

        Auth::user()->update($data);

        return redirect()->route('supervisor.profile');
    }
}
