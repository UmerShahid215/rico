<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'parent_id', 'profile_pic', 'date', 'tl_name', 'agent_name', 'customer_name',
        'company_name', 'cell_phone', 'home_phone', 'customer_email', 'service_type',
        'billing_ac_number', 'reference', 'ssn', 'dob', 'per_month', 'total_to_pay', 'receivable',
        'comment', 'complete_address', 'zip_code', 'city', 'state',  'country',
        'comment_disable_time',
    ];

    protected $dates = ['comment_disable_time', 'dob', 'date'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'form_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function statusColor()
    {
        $statusColor = [
            'pending' => 'primary',
            'approved' => 'success',
            'rejected' => 'danger',
        ];

        return $statusColor[$this->status] ?? 'info';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}
