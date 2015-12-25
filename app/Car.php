<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['mark', 'model', 'year', 'register_number', 'color', 'sts', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
