<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['fio', 'birthday', 'passport_number', 'drivers_license_number', 'drivers_license_date', 'user_id'];
}
