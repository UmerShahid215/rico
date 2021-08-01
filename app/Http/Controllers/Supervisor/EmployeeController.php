<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmployeeController extends Controller
{



    public function index()
    {
        $user = Auth::user();

        $users = $user->employees()->get();

        $usersCount = $users->count();


        return view('supervisors.employees.index', compact('users', 'usersCount'));
    }

    public function create()
    {
        $users = User::role('supervisor')->get();

        return view('supervisors.employees.create', compact('users'));
    }



    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();

        $user = User::find($data['parent_id']);

        if ($user && (!$user->hasRole('supervisor'))) {
            return redirect()->back()->withErrors(['parent_id', 'Please select the right Supervisor.']);
        }

        if ($request->hasFile('profile_pic')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }

        $user = User::create($data);

        $user->assignRole('customer');


        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Employee created Successfully.');

        return redirect()->route('supervisor.employee.index');
    }

}
