<?php

namespace App\Http\Controllers\SemiAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function show(Form $form, $notification_id)
    {
        $manager = Auth::user();

        $notification = $manager->notifications()->find($notification_id);

        if ($notification && is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('managers.forms.show', compact('form'));
    }

    public function view(Form $form)
    {
        return view('managers.forms.show', compact('form'));
    }

    public function index(User $employee)
    {
        $forms = $employee->forms()->where('status', 'approved')->get();

        return view('semi-admin.supervisors.employees.forms.index', compact('forms'));
    }
}
