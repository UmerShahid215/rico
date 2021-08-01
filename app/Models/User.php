<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    //    protected $fillable = [
    //        'name',
    //        'email',
    //        'password',
    //    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function forms()
    {
        if ($this->hasRole('customer')) {
            return $this->employeeForms();
        } else {
            return $this->supervisorForms();
        }
    }

    public function employeeForms()
    {
        return $this->hasMany(Form::class, 'user_id', 'id');
    }

    public function supervisorForms()
    {
        return $this->hasMany(Form::class, 'parent_id', 'id');
    }

    public function employees()
    {
        if ($this->hasRole('supervisor')) {
            return $this->hasMany(User::class, 'parent_id', 'id');
        }
    }

    public function supervisors()
    {
        if ($this->hasRole('manager')) {
            return $this->hasMany(User::class, 'parent_id', 'id');
        }
    }

    public function supervisor()
    {
        if ($this->hasRole('customer')) {
            return $this->belongsTo(User::class, 'parent_id', 'id');
        }
    }

//    public function getFullNameAttribute()
//    {
//        return $this->attributes['f_name'] . ' ' . $this->attributes['l_name'];
//    }

    //only for semi-admin.
    public function getFormsAttribute()
    {
        $supervisors = $this->supervisors->pluck('id');
        $employees = User::select('id')->whereIn('parent_id', $supervisors)->get()->pluck('id');
        $forms = Form::where('status', 'approved')->whereIn('user_id', $employees)->get();

        return $forms;
    }

    //only for semi-admin
    public function getEmployeesCountAttribute()
    {
        $count = 0;

        if ($this->hasRole('manager')) {
            $supervisors = $this->supervisors->pluck('id');
            $count = User::select('id')->whereIn('parent_id', $supervisors)->count();
        }

        return $count;
    }

    //only for semi-admin
    public function getEmployeesFormsCountAttribute()
    {

        $count = 0;

        if ($this->hasRole('manager')) {
            $supervisors = $this->supervisors->pluck('id');
            $employees = User::select('id')->whereIn('parent_id', $supervisors)->get()->pluck('id');
            $count = Form::where('status', 'approved')->whereIn('user_id', $employees)->count();
        }

        if ($this->hasRole('supervisor')) {
            $employees = $this->employees->pluck('id');
            $count = Form::whereIn('user_id', $employees)->count();
        }

        return $count;
    }

    //only for semi-admin
    public function approvedForms($limit = 5)
    {
        $forms = collect([]);

        if ($this->hasRole('manager')) {
            $supervisors = $this->supervisors->pluck('id');
            $employees = User::select('id')->whereIn('parent_id', $supervisors)->get()->pluck('id');
            $forms = Form::where('status', 'approved')->whereIn('user_id', $employees)->latest()->limit($limit)->get();
        }

        return $forms;
    }

    public function getSemiAdminEmployeesAttribute()
    {
        $employees = collect([]);

        if ($this->hasRole('manager')) {
            $supervisors = $this->supervisors->pluck('id');
            $employees = User::withCount('employeeForms')->whereIn('parent_id', $supervisors)
                ->orderBy('employee_forms_count', 'desc')->limit(5)->get();
        }

        return $employees;
    }
}
