<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(){
        return view('managers.add-supervisor');
    }

}