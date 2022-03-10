<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = [
     'employee_password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->employee_password;
    }
    public function test(){
        return 'success';
    }
}
