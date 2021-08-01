<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function employeeAllAttendance(){
        $data=Attendence::all();
        return view('admin.employees.attendance',compact('data'));
    }
}
