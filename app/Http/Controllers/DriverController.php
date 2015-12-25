<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index(){
        return view('pages.drivers');
    }

    public function create(Request $request){
        Driver::create([
            'fio' => $request->fio,
            'birthday' => $request->birthday,
            'passport_number' => $request->passport_number,
            'drivers_license_number' => $request->drivers_license_number,
            'drivers_license_date' => $request->drivers_license_date,
            'user_id' => Auth::user()->id
        ]);

        return redirect('drivers');
    }
}
