<?php

namespace App\Http\Controllers\SemiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SupervisorController extends Controller
{
    public function index()
    {
        $curr_user = 'Super Visor';
        $canSelect = 'Semi Admin';
        $filterRole = 'manager';
        $curr_user_permission = 'supervisor';
        $data = User::whereHas("roles", function ($q) use ($curr_user_permission) {
            $q->where("name", $curr_user_permission);
        })->get();
        $count = count($data);
        return view('semi-admin.supervisors.index', compact('data', 'count', 'canSelect', 'curr_user', 'curr_user_permission', 'filterRole'));
    }


    public function create()
    {
        $users = User::role('manager')->get();

        return view('managers.add-supervisor', compact('users'));
    }


    public function store(SupervisorRequest $request)
    {
        $data = $request->validated();

        $user = User::find($data['parent_id']);

        if ($user && (!$user->hasRole('manager'))) {
            return redirect()->back()->withErrors(['parent_id', 'Please select the right Semi Admin']);
        }

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }

        $user = User::create($data);

        $user->assignRole('supervisor');

        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Supervisor created Successfully.');

        return redirect()->route('manager.supervisors.index');
    }
}
