<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Notifications\FormSubmitNotification;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $forms = Auth::user()->forms;

        return view('users.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request->all());

        $request->validate([
            'user_id' => ['nullable'],
            'parent_id' => ['nullable'],
            'date' => ['required'],
            'tl_name' => ['required'],
            'agent_name' => ['required'],
            'customer_name' => ['required'],
            'cell_phone' => ['required'],
            'service_type' => ['required'],
            'billing_ac_number' => ['required'],
            'total_to_pay' => ['required'],
            'receivable' => ['required'],
            'profile_pic' => ['nullable'],

        ]);
        $request['user_id'] = auth()->user()->id;
        //        dd($request->all());
        $data = $request->all();
        if ($request->file('profile_pic')) {

            $filename = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads'), $filename);
            $data['profile_pic'] = $filename;
        } else {
            $filename = NULL;
        }

        $user = auth()->user();
        $supervisor = User::findOrFail($user->parent_id);

        $data['comment_disable_time'] = now()->addDays(2)->toDateTimeString();


        $form = Form::create($data);

        $supervisor->notify(new FormSubmitNotification($user, $form->id));

        return redirect()->route('employee.forms.index');
    }

    /**
     * Display the specified
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
