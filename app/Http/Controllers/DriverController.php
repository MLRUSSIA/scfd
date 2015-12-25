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
            'birthday' => date('d.m.Y', strtotime ($request->birthday)),
            'passport_number' => $request->passport_number,
            'drivers_license_number' => $request->drivers_license_number,
            'drivers_license_date' => date('d.m.Y', strtotime ($request->drivers_license_date)),
            'user_id' => Auth::user()->id
        ]);

        return redirect('drivers');
    }

    public function search($input){
        $item = Driver::where('fio', 'like', '%'.$input.'%')
            ->orWhere('passport_number', 'like', '%'.$input.'%')
            ->orderBy('fio', 'asc')
            ->select('id', 'fio', 'birthday')
            ->paginate(15);
        return $item;
    }
}
