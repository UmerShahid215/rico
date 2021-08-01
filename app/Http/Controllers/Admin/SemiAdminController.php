<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\semiadminRequest;
use Illuminate\Support\Facades\Storage;

class SemiAdminController extends Controller
{

    public function index()
    {
        $users = User::role('semiadmin')->get();
        return view('admin.semi-admin.index', compact('users'));
    }


    public function create()
    {
        return view('admin.semi-admin.create');
    }



    public function store(semiadminRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }

        $user = User::create($data);

        $user->assignRole('semiadmin');


        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Supervisor created Successfully.');

        return redirect()->route('admin.semi-admins.index');
    }



    public function edit(User $semi_admin)
    {
        $user = &$semi_admin;

        if (!$user->hasRole('semiadmin')) {
            abort(403);
        }

        return view('admin.semi-admin.edit', compact('user'));
    }



    public function update(semiadminRequest $request, User $semi_admin)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {

            if ($semi_admin->profile_picture) {
                Storage::delete($semi_admin->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }

        $semi_admin->update($data);


        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Supervisor updated Successfully.');

        return redirect()->route('admin.semi-admins.index');
    }


    public function supervisors(User $semi_admin)
    {
        $users = $semi_admin->supervisors()->get();

        return view('admin.semi-admin.supervisors.index', compact('users'));
    }


    public function forms(User $semi_admin)
    {
        $forms = $semi_admin->forms;

        return view('admin.semi-admin.forms.index', compact('forms'));
    }
}
