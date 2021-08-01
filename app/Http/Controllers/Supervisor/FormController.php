<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\SendEmployeeStatusUpdateNotification;
use App\Notifications\SendSemiAdminStatusUpdateNotification;
use Illuminate\Validation\Rule;

class FormController extends Controller
{

    //route model binding Form $form attribute use this when make functional.
    public function show(Form $form, $notification_id)
    {
        $supervisor = Auth::user();

        if ($supervisor->id !== $form->parent_id) abort(403);

        $notification = $supervisor->notifications()->find($notification_id);

        if ($notification && is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('supervisors.forms.show', compact('form'));
    }




    public function updateStatus(Request $request, Form $form)
    {

        $supervisor = Auth::user();


        $data = $request->validate([
            'status' => ['required', Rule::in(['approved', 'rejected', 'pending'])],
        ]);

        if ($supervisor->hasRole('supervisor')) {
            $form = $supervisor->forms()->findOrFail($form->id);
            if ($form->status === 'pending') {
                $form->status = $data['status'];
                $form->save();
            }
        }

        $employee = User::find($form->user_id);


        $employee->notify(new SendEmployeeStatusUpdateNotification($supervisor, $form->id));

        if ($form->isApproved()) {

            $semiAdmin = user::find($supervisor->parent_id);

            $semiAdmin->notify(new SendSemiAdminStatusUpdateNotification($supervisor, $form->id));
        }

        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Form status updated Successfully.');

        return redirect()->back();
    }

    public function index()
    {

        $forms = Auth::user()->forms()->get();

        return view('supervisors.forms.index', compact('forms'));
    }

    public function forms(User $employee)
    {
        $forms = $employee->forms()->get();

        return view('supervisors.forms.index', compact('forms'));
    }

    public function view(Form $form)
    {
        $user = Auth::user();

        if ($user->id !== $form->parent_id) {
            abort(403);
        }

        return view('supervisors.forms.show', compact('form'));
    }
}
