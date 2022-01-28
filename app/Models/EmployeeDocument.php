<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $fillable = [
        'file_name',
        'employee_id',
    ];

//    public function users()
//    {
//        return $this->belongsTo(User::class, 'file_id', 'id');
//    }
}
