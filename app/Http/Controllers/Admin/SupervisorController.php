<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SupervisorRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SupervisorController extends Controller
{
    public function index()
    {
        $users = User::role('supervisor')->get();
        return view('admin.supervisors.index', compact('users'));
    }


    public function create()
    {
        $users = User::role('manager')->get();

        return view('admin.supervisors.create', compact('users'));
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

        return redirect()->route('admin.supervisors.index');
    }


    public function edit(User $supervisor)
    {
        $user = &$supervisor;

        $users = User::role('manager')->get();

        return view('admin.supervisors.edit', compact('user', 'users'));
    }


    public function update(SupervisorRequest $request, User $supervisor)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            if ($supervisor->profile_picture) {
                Storage::delete($supervisor->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }


        $supervisor->update($data);

        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Supervisor updated Successfully.');

        return redirect()->route('admin.supervisors.index');
    }


    public function employees(User $supervisor)
    {
        $users = $supervisor->employees()->get();

        return view('admin.supervisors.employees.index', compact('users'));
    }


    public function forms(User $supervisor)
    {
        $forms = $supervisor->forms()->get();

        return view('admin.supervisors.forms.index', compact('forms'));
    }
}
