<?php

namespace App\Http\Controllers\SemiAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index(User $supervisor)
    {
        $employees = $supervisor->employees;
        return view('semi-admin.supervisors.employees.index', compact('employees'));
    }
}
