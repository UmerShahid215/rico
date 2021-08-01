<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('can-employee-comment')->only('store');
    }

    public function store(Request $request)
    {
        $employee = Auth::user();

        $data =  $request->validate([
            'comment' => ['required', 'string'],
            'form'  => ['required', 'numeric', 'exists:forms,id'],
            'file' => ['nullable', 'file', 'max:2048'],
        ]);

        if ($employee->hasRole('customer')) {

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $data['file'] = $file->store('files');
                $data['file_name'] = $file->getClientOriginalName();
            }

            $employee->forms()->findOrFail($data['form'])
                ->comments()
                ->create([
                    'user_id' => $employee->id,
                    'comment' => $data['comment'],
                    'file' => $data['file'] ?? null,
                    'file_name' => $data['file_name'] ?? null,
                ]);
        }

        $request->session()->flash('class', 'success');
        $request->session()->flash('message', 'Comment send and save successfully.');

        return redirect()->route('employee.forms.index');
    }


    public function index(Form $form)
    {
        $comments = $form->comments()->with('user')->get();

        return view('users.forms.comments.index', compact('comments'));
    }

    public function downloadFile(Comment $comment)
    {
        if (Storage::disk('local')->exists($comment->file)) {

            return Storage::download($comment->file, $comment->file_name);
        } else {

            return redirect()->back();
        }
    }
}
