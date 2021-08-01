<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {

        $users = User::role('customer')->get();

        return view('admin.employees.index', compact('users'));
    }


    public function create()
    {
        $users = User::role('supervisor')->get();

        return view('admin.employees.create', compact('users'));
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

        return redirect()->route('admin.employees.index');
    }



    public function edit(User $employee)
    {
        $user = &$employee;

        $users = User::role('supervisor')->get();

        return view('admin.employees.edit', compact('users', 'user'));
    }



    public function update(EmployeeRequest $request, User $employee)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            if ($employee->profile_picture) {
                Storage::delete($employee->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('profiles');
        }

        $employee->update($data);


        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Employee updated Successfully.');

        return redirect()->route('admin.employees.index');
    }


    public function forms(User $employee)
    {

        $forms = $employee->forms()->get();

        return view('admin.employees.forms.index', compact('forms'));
    }

    public function shift($employee){
        $data['user']=User::where('id',$employee)->first();
        $data['supervisor']=User::role('supervisor')->get();
        return view('admin.employees.shift', compact('data'));
    }

    public function shiftPost(Request $request,$id){
        $update=User::where('id',$id)->update([
            'parent_id'=>$request->parent_id
        ]);
        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Supervisor updated Successfully.');
        return redirect()->back();
    }
}
