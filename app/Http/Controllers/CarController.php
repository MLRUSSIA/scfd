<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index($sort){
        if($sort == 'all'){$cars = Car::whereNotIn('status', ['delete'])->get();}
        if($sort == 'free'){$cars = Car::where('status', 'free')->get();}
        if($sort == 'job'){$cars = Car::where('status', 'job')->get();}
        if($sort == 'warning'){$cars = Car::where('status', 'warning')->get();}
        if($sort == 'delete'){$cars = Car::where('status', 'delete')->get();}

        return view('pages.cars', compact('cars'));
    }

    public function create(Request $request){
        Car::create([
            'mark' => $request->mark,
            'model' => $request->model,
            'year' => $request->year,
            'register_number' => $request->register_number,
            'color' => $request->color,
            'sts' => $request->sts,
            'status' => 'free',
            'user_id' => Auth::user()->id
        ]);
        return redirect('cars/all');
    }
}
