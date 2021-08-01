<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {

            return Redirect::to(URL::previous())->with('error', $validator->messages()->first());
        }


        $email = User::where('email', $request->email)->first();
        if ($email) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                if (Auth::user()->hasRole('admin')) {
                    return redirect()->route('admin.dashboard')->with('message', 'Welcome to Admin Dashboard.');
                }

                if (Auth::user()->hasRole('manager')) {
                    return redirect()->route('manager.dashboard')->with('message', 'Welcome to Semi Admin Dashboard.');
                }

                if (Auth::user()->hasRole('supervisor')) {
                    return redirect()->route('supervisor.dashboard')->with('message', 'welcome to Supervisor Dashboard.');
                }

                if (Auth::user()->hasRole('customer')) {
                    $user=User::where('email',$request->email)->first();
                    Attendence::create([
                        'employee_id'=>$user->id,
                        'Employee_name'=>$user->f_name.' '.$user->l_name,
                        'type'=>'check-in',
                    ]);
                    return redirect()->route('employee.forms.index')->with('message', 'Welcome to Employee Dashboard.');
                }


                return \redirect(\url('/main-view'))->with('Success', 'LoggedIn Successfully');
            } else {
                return \redirect()->back()->with('error', 'Invalid Password');
            }
        } else {
            return \redirect()->back()->with('error', 'Email Not Found');
        }
    }
    public function logout()
    {
        if (Auth::user()->hasRole('customer')) {
            $user = Auth::user();
            Attendence::create([
                'employee_id' => $user->id,
                'Employee_name' => $user->f_name . ' ' . $user->l_name,
                'type' => 'check-out',
            ]);
        }
        Auth::logout();
        return redirect(url('login'));
    }
}
